@extends('layouts.layout')

@section('title', 'Регистрация')

@section('content')
<section class="sec1">
    <div class="div-reg">
        @include('layouts.registration-pages.header', [
            'class' => 'logo-reg',
            'title' => 'Волшебный мир GHibli'
        ])

        <form class="form-reg" action="{{ route('action_sign-up') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            @isset($message)
                <div
                    style="color: #1B9DCF; font-size: 20px; margin-left: -32vw; text-align: center;">
                    {{ $message }}
                </div>
            @endisset
            <input type="text" name="login" placeholder="Придумайте логин">
            @error('login')
            <div style="color: #1B9DCF;" class="error_validation">{{ $message }}</div>
            @enderror
            <br>
            <input type="text" name="nickname" placeholder="Придумайте никнейм">
            @error('nickname')
            <div style="color: #1B9DCF;" class="error_validation">{{ $message }}</div>
            @enderror
            <br>
            <label class="form-reginput-file" for="avatar">
                <input type="file" name="avatar" style="display: none" id="avatar">
                <span class="input-file-text">Выберите фотографию</span>
                <span class="input-file-btn">Выбрать</span>
            </label>
            @error('avatar')
            <div style="color: #1B9DCF;" class="error_validation">{{ $message }}</div>
            @enderror
            <br>
            <input type="password" name="password" placeholder="Придумайте пароль">
            @error('password')
            <div style="color: #1B9DCF;" class="error_validation">{{ $message }}</div>
            @enderror
            <br>
            <input type="password" name="password_confirmation" placeholder="Повторите пароль">
            @error('password_confirmation')
            <div style="color: #1B9DCF;" class="error_validation">{{ $message }}</div>
            @enderror
            <br>
            <div>
                <input class="ch" type="checkbox" name="consent" id="scales"/>
                <label class="chl" for="scales">Согласие на обработку персональных данных</label>
            </div>
            <br>
            <button disabled id="register" class="breg">Зарегестрироваться</button>
        </form>

        @include('layouts.registration-pages.hrefs', ['class' => 'abs-reg'])
    </div>

    <div class="div-img">
        <img class="img-reg" src="{{ asset('img/Rectangle 59.png') }}" alt="">
    </div>

</section>

@isset($message)
    <script>

    </script>
@endisset

@endsection
