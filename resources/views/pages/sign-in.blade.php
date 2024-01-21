@extends('layouts.layout')

@section('title', __('Войти'))

@section('content')
<section class="sec1">
    <div class="div-reg">
        @include('layouts.registration-pages.header', [
            'class' => 'logo-regw',
            'title' => __('С возвращением в мир GHIbLI')
        ])

        @php
            $errors = $errors->getBags();
            $errors['error'] = $error ?? null;
        @endphp

        <sign-in
            action = '{!! route('action_sign-in') !!}'
            error-list = '@json($errors, JSON_UNESCAPED_UNICODE)'
            old-data ='@json(['login' => old('login'), 'password' => old('password')], JSON_UNESCAPED_UNICODE)'
            csrf = '@csrf'
            redirect-page = '{!! route('index') !!}'
            message = '{!! $message ?? null !!}'
        ></sign-in>

        <a class="links" href="{{ route('sign-up') }}">
            {{ __('Зарегистрироваться') }}
        </a>
        @include('layouts.registration-pages.hrefs', ['class' => 'abs-reg2'])
    </div>
    <div class="div-img">
        <img class="img-reg" src="{{ asset('img/totoro.png') }}" alt="">
    </div>
</section>
@endsection
