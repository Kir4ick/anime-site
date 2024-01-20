<header>
    <img class="logo" src="{{ asset('img/image_23-ox0diCzpl-transformed 2.png') }}" alt="">
    <a href="{{ route('biography') }}">
        <p class="bio">Биография</p>
    </a>
    <a href="">
        <p class="collection">Коллекция мультфильмов</p>
    </a>
    @auth()
        @if (Auth::user()->is_admin)
            <a href="{{ route('profile') }}">
        @else
            <a href="{{ route('logout') }}">
        @endif
            <img
                class="login"
                style="border-radius: 50%; object-fit: cover"
                src="{{
                        \Illuminate\Support\Facades\Storage::disk('local')
                            ->url(\Illuminate\Support\Facades\Auth::user()->avatar)
                }}"
                alt=""
            >
        </a>
    @endauth
    @guest()
        <a href="{{ route('sign-in') }}">
            <img class="login" src="{{asset('img/login 1.png')}}" alt="">
        </a>
    @endguest
</header>
