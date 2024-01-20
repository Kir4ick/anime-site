<template>
    <form class="form-reg" :action="action" method="post" @submit.prevent="signIn">
        <div v-html="csrf"></div>
        <input
            class="green"
            id="login"
            type="text"
            name="login"
            placeholder="Введите логин"
            :value="modelOldData.login"
        >
        <div v-if="!checkUndefinedValue(modelErrorList.error)">
            <div class="error_validation">{{ modelErrorList.error }}</div>
        </div>
        <div v-if="!checkUndefinedValue(modelErrorList.login)">
            <div class="error_validation">{{ modelErrorList.login }}</div>
        </div>
        <br>
        <input
            class="green"
            id="password"
            type="password"
            name="password"
            placeholder="Введите пароль"
            :value="modelOldData.password"
        >
        <div v-if="!checkUndefinedValue(modelErrorList.password)">
            <div class="error_validation">{{ modelErrorList.password }}</div>
        </div>
        <br>
        <br>
        <br>
        <button id="sign-in" class="breg2">Войти</button>
    </form>
</template>

<script setup>
    import SignInService from "../services/signInService.js";
    import errorList from "../models/components/signIn/errorList.js";
    import {checkUndefinedValue} from "../../js/validation/validators.js";
    import {onMounted, reactive} from "vue";

    let service = new SignInService()

    const props = defineProps({
        errorList: String,
        action: String,
        oldData: String,
        csrf: String
    })

    /** @type {errorList} **/
    const modelErrorList = reactive(
        service.getObjectErrorList(props.errorList)
    )

    const modelOldData = reactive(
        JSON.parse(props.oldData)
    )

    function signIn(e) {
        let errors = {}

        let loginField = document.getElementById('login')
        let loginMessage = service.validateLogin(loginField.value)
        if (loginMessage !== '') {
            errors.login = loginMessage
        }

        let passwordField = document.getElementById('password')
        let passwordMessage = service.validatePassword(passwordField.value)
        if (passwordMessage !== '') {
            errors.password = passwordMessage
        }

        if (!checkUndefinedValue(errors.login) || !checkUndefinedValue(errors.password)) {
            modelErrorList.login = errors.login
            modelErrorList.password = errors.password
            return null
        }

        e.target.submit()
    }

    function clearInfoInTimeout() {
        setInterval(() => {
            modelErrorList.login = undefined
            modelErrorList.password = undefined
        }, 10000)
    }

    onMounted(() => {
        clearInfoInTimeout()
    })
</script>
