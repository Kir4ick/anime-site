<template>
    <form class="form-reg" :action="action" method="post" @submit.prevent="signIn">
        <div v-html="csrf"></div>
        <input
            class="green"
            id="login"
            type="text"
            name="login"
            placeholder="Введите логин"
            :value="oldData.login"
        >
        <div v-if="objectErrorList.error !== undefined">
            <div class="error_validation">{{ objectErrorList.error }}</div>
        </div>
        <div v-if="objectErrorList.login !== undefined">
            <div class="error_validation">{{ objectErrorList.login }}</div>
        </div>
        <br>
        <input
            class="green"
            id="password"
            type="password"
            name="password"
            placeholder="Введите пароль"
            :value="oldData.password"
        >
        <div v-if="objectErrorList.password !== undefined">
            <div class="error_validation">{{ objectErrorList.password }}</div>
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

    let service = new SignInService()

    const props = defineProps({
        errorList: String,
        action: String,
        oldData: String,
        csrf: String
    })

    /** @type {errorList} **/
    let objectErrorList = service.getObjectErrorList(props.errorList)

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

        if (errors.login !== undefined && errors.password !== undefined) {
            objectErrorList = errors
            return null
        }

        e.target.submit()
    }
</script>

<style scoped>

</style>
