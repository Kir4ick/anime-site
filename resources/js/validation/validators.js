/* Функции валидаторы */

export function validateConsent(consentId, buttonId) {
    /** Функция для блокировки кнопки в форме, для того, чтобы пользователь мог зарегистрироваться только при галке **/
    let button = document.getElementById(buttonId); //'register'
    let input_consent = document.getElementById(consentId); //scales
    let disabled = false;

    input_consent.addEventListener('change', function () {
        if (!input_consent.checked) {
            disabled = true
        }

        button.disabled = disabled

        return disabled
    });
}

export function checkUndefinedValue(value) {
    return value === undefined
}

export function checkIsNullValue(value) {
    return value === null
}

export function checkIsEmptyStringValue(value) {
    return value === ''
}
