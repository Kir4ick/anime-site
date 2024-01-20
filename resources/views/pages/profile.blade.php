@extends('layouts.layout')

@section('title', $nickname)

@section('content')
<section class="main">

    @include('layouts.admin.header')

    <section class="general">
        <div class="forms">
            <label class="label-name" for="">Добавить мультфильм</label>
            <form class="form-regg" action="" method="post" enctype="multipart/form-data">
                <input class="inp" type="email" placeholder="Название мультфильма"><br>
                <input class="inp" type="text" placeholder="Премьера мультфильма"><br>
                <label class="form-reginput-file">
                    <span class="input-file-textt">Выберите обложку мультильма</span>
                    <span class="input-file-btn">Выбрать</span>
                </label>
                <br>
                <br>
                <button class="bregg">Добавить</button>
            </form>
        </div>
        <div class="prof-grids">
            <div class="lab">
                <label class="label-name2" for="">Мультфильмы</label>
            </div>
            <div class="colums">
                <div class="wth72l">
                    <img class="imgava2l" src="img/Rectangle 31.png" alt="">
                    <img class="imgpdp72l" src="img/Group 157.png" alt="">
                    <p class="ppp">20 ноября 2004</p>
                    <p class="ppp2">«Ветер крепчает»</p>
                </div>
                <div class="wth72l">
                    <img class="imgava2l" src="img/Rectangle 31.png" alt="">
                    <img class="imgpdp72l" src="img/Group 157.png" alt="">
                    <p class="ppp">20 ноября 2004</p>
                    <p class="ppp2">«Ветер крепчает»</p>
                </div>
                <div class="wth72l">
                    <img class="imgava2l" src="img/Rectangle 31.png" alt="">
                    <img class="imgpdp72l" src="img/Group 157.png" alt="">
                    <p class="ppp">20 ноября 2004</p>
                    <p class="ppp2">«Ветер крепчает»</p>
                </div>

                <div class="wth72l">
                    <img class="imgava2l" src="img/Rectangle 31.png" alt="">
                    <img class="imgpdp72l" src="img/Group 157.png" alt="">
                    <p class="ppp">20 ноября 2004</p>
                    <p class="ppp2">«Ветер крепчает»</p>
                </div>
                <div class="wth72l">
                    <img class="imgava2l" src="img/Rectangle 25.png" alt="">
                    <img class="imgpdp72l" src="img/Group 157.png" alt="">
                    <p class="ppp">12 июля 1997</p>
                    <p class="ppp2">«Принцесса Мононоке»</p>
                </div>
                <div class="wth72l">
                    <img class="imgava2l" src="img/Rectangle 31.png" alt="">
                    <img class="imgpdp72l" src="img/Group 157.png" alt="">
                    <p class="ppp">20 ноября 2004</p>
                    <p class="ppp2">«Ветер крепчает»</p>
                </div>
            </div>
        </div>
</section>
@endsection
