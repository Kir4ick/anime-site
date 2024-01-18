export default function (to, timeout = 0) {
    /** Функция для редиректа на другую страницу **/
    setTimeout(function () {
        window.location.href = to
    }, timeout);
}
