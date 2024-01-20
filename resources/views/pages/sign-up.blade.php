@extends('layouts.layout')

@section('title', 'Регистрация')

@section('content')
<section class="sec1">
    <div class="div-reg">
        @include('layouts.registration-pages.header', [
            'class' => 'logo-reg',
            'title' => 'Волшебный мир GHibli'
        ])

        @php
            $errors = $errors->getMessages();
            foreach ($errors as $key => $error) {
                $errors[$key] = $error[0];
            }
        @endphp

        <sign-up
            error-list = '@json($errors, JSON_UNESCAPED_UNICODE)'
            action = '{!! route('action_sign-up') !!}'
            csrf = '@csrf'
            message = '{{ $message ?? '' }}'
            redirect-page = '{!! route('index') !!}'
        ></sign-up>

        @include('layouts.registration-pages.hrefs', ['class' => 'abs-reg'])
    </div>

    <div class="div-img">
        <img class="img-reg" src="{{ asset('img/Rectangle 59.png') }}" alt="">
    </div>

</section>
@endsection
