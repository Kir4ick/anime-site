@php
    $class_footer = $class ?? 'f2'
@endphp
<footer class="{{ $class_footer }}">
    <a href="MULTI.html">
        <p class="textt1">Биография</p>
    </a>
    <a href="indexx.html">
        <p class="textt2">Коллекция мультфильмов</p>
    </a>
    <p class="textt3">Следи за нами</p>
    <img class="free-icon" src="{{ asset('img/free-icon-telegram-739260.png') }}" alt="">
    <img class="free-icon" src="{{ asset('img/free-icon-youtube-1077046.png') }}" alt="">
    <img class="free-icon" src="{{ asset('img/free-icon-vk-2111828.png') }}" alt="">
</footer>
