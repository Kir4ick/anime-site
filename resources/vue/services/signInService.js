import consent from "../../js/validation/consent.js";

export default class SignInService {

    getObjectErrorList(string) {
        try {
            return JSON.parse(string)
        } catch (exception) {
            console.log(exception)
        }

        return {}
    }

    validatePassword(password) {
        let message = ''

        if (typeof password !== "string") {
            message = 'Неправильный тип данных пароля'
        }

        if (password.length < 4) {
            message = 'Пароль не может содержать меньше 4 символов'
        }

        return message
    }

    validateLogin(login) {
        let message = ''

        if (typeof login !== "string") {
            message = 'Неправильный тип данных логина'
        }

        if (login.length < 4) {
            message = 'Логин не может содержать меньше 4 символов'
        }

        return message
    }
}
