<template>
    <form class="form-reg" :action="action" method="post" @submit.prevent="signUp" enctype="multipart/form-data">
        <div v-html="csrf"></div>
        <div v-if="!checkUndefinedValue(modelErrorList.message)">
            <div
                style="color: #1B9DCF; font-size: 20px; margin-left: -32vw; text-align: center;">
                {{ modelErrorList.message }}
            </div>
        </div>
        <div v-if="props.message !== ''">
            <div
                style="color: #1B9DCF; font-size: 20px; margin-left: -32vw; text-align: center;">
                {{ props.message }}
            </div>
        </div>
        <input type="text" name="login" placeholder="Придумайте логин">
        <div v-if="!checkUndefinedValue(modelErrorList.login)">
            <div style="color: #1B9DCF;" class="error_validation">{{ modelErrorList.login }}</div>
        </div>
        <br>
        <input type="text" name="nickname" placeholder="Придумайте никнейм">
        <div v-if="!checkUndefinedValue(modelErrorList.nickname)">
            <div style="color: #1B9DCF;" class="error_validation">{{ modelErrorList.nickname }}</div>
        </div>
        <br>
        <label class="form-reginput-file" for="avatar">
            <input type="file" name="avatar" style="display: none" id="avatar">
            <span class="input-file-text">Выберите фотографию</span>
            <span class="input-file-btn">Выбрать</span>
        </label>
        <div v-if="!checkUndefinedValue(modelErrorList.avatar)">
            <div style="color: #1B9DCF;" class="error_validation">{{ modelErrorList.avatar }}</div>
        </div>
        <br>
        <input type="password" name="password" placeholder="Придумайте пароль">
        <div v-if="!checkUndefinedValue(modelErrorList.password)">
            <div style="color: #1B9DCF;" class="error_validation">{{ modelErrorList.password }}</div>
        </div>
        <br>
        <input type="password" name="password_confirmation" placeholder="Повторите пароль">
        <div v-if="!checkUndefinedValue(modelErrorList.password_confirmation)">
            <div style="color: #1B9DCF;" class="error_validation">{{ modelErrorList.password_confirmation }}</div>
        </div>
        <br>
        <div>
            <input class="ch" type="checkbox" name="consent" id="scales"/>
            <label class="chl" for="scales">Согласие на обработку персональных данных</label>
        </div>
        <br>
        <button disabled id="register" class="breg">Зарегестрироваться</button>
    </form>
</template>

<script setup>

    import {onMounted, reactive} from "vue";
    import errorList from "../models/components/signUp/errorList.js";
    import {checkUndefinedValue, validateConsent} from "../../js/validation/validators.js";

    const props = defineProps({
        errorList: String,
        csrf: String,
        action: String,
        message: String,
        redirectPage: String
    })

    /** @type errorList **/
    const modelErrorList = reactive(
        JSON.parse(props.errorList)
    )

    function signUp(e) {
        e.target.submit()
    }

    function redirectAfterRegister() {
        setTimeout(() => {
            window.location.href = props.redirectPage
        }, 10000)
    }

    function clearMessageErrors() {
        setInterval(() => {
            modelErrorList.message = undefined
            modelErrorList.login = undefined
            modelErrorList.nickname = undefined
            modelErrorList.avatar = undefined
            modelErrorList.password = undefined
            modelErrorList.password_confirmation = undefined
        }, 5000)
    }

    onMounted(() => {
        if (props.message !== '') {
            redirectAfterRegister()
        }

        validateConsent('scales', 'register')
        clearMessageErrors()
    })

</script>
