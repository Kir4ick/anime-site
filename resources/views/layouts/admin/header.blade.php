<header>
    <a href="{{ route('articles') }}">
        <p class="stats">статьи</p>
    </a>
    <p class="addendum">Добавление мультфильма</p>
    <a href="{{ route('logout') }}">
        <img
            class="login2"
            style="border-radius: 50%; object-fit: cover"
            src="{{ $avatar_url }}"
            alt=""
        >
    </a>
</header>
