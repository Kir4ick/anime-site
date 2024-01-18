export default function () {
    /** Функция для блокировки кнопки в форме, для того, чтобы пользователь мог зарегистрироваться только при галке **/
    let button = document.getElementById('register');
    let input_consent = document.getElementById('scales');
    let disabled = false;

    input_consent.addEventListener('change', function () {
        if (!input_consent.checked) {
            disabled = true
        }

        button.disabled = disabled

        return disabled
    });
}
