<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title> @yield('title') </title>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    @vite('resources/js/app.js')
</body>
