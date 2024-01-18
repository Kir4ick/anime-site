@extends('layouts.layout')

@section('title', 'Студия Гибли')

@section('content')
    <section class="main">
        @include('layouts.header')
        <div class="content">
            <div class="content-info1">
                <img class="main-photo" src="{{asset('img/Rectangle 2.png')}}" alt="">
                <p class="name">Студия Ghibli</p>
                <p class="slogan">Царство<br> грёз и<br> безумия</p>
                <img class="klaksa" src="{{asset('img/image_24-zbMKmuUtf-transformed 1.png')}}" alt="">
            </div>
            <div class="content-info2">
                <p class="year">1985 - <br>2023</p>
                <p class="inf">38 лет с основания</p>
            </div>
            <img class="totoro" src="{{asset('img/wallpaperflare_com_wallpaper_(2)-transformed 1.png')}}" alt="">
        </div>
        <div class="content-bottom">
            <button class="long-film">Полнометражные фильмы</button>
            <button class="anime">Аниме-сериалы</button>
            <button class="video-game">Видеоигры</button>
            <br>
            <button class="miuse-klips">Музыкальные видеоклипы</button>
            <button class="small-film">Короткометражные фильмы</button>
        </div>
    </section>
    <section class="best-films">
        <p class="best-text">Лучшие фильмы</p>
        <div class="flex">
            @for($i = 1; $i <= 4; $i++)
                @include('layouts.index-page.best-films', [
                    'class' => 'div'.$i,
                    'path' => 'best-film_'.$i.'.png',
                    'name' => 'Ведьмина служба доставки',
                    'date' => '29 июля 1989'
                ])
            @endfor
        </div>
    </section>

    <img class="cat" src="{{asset('img/Без названия (3)-PhotoRoom 1.png')}}" alt="">
    <img class="girl" src="{{asset('img/Без названия (2) 1.png')}}" alt="">
    <p class="dop">Основатели&Студия</p>

    <section class="info-group">
        <div class=" container1">
            <div class="img-text">
                <img class="imgg" src="{{asset('img/Rectangle 12.png')}}" alt="">
                <div class="textt">
                    <p class="blue">Исао Такахата</p>
                    <p class="black">Исао Такахата (1935-2018) - японский режиссер анимационных фильмов, известный своим
                        уникальным стилем и глубоким
                        художественным подходом. Он сотрудничал с анимационной студией Studio Ghibli и снял такие
                        фильмы, как "Гробница
                        светлячков" и "Могилистая девочка", завоевавшие многочисленные награды и признание по всему
                        миру.</p>
                </div>
            </div>
            <div class="img-text">


                <div class="textt">
                    <p class="blue1">Хая́о Миядза́ки</p>
                    <p class="black1">известный японский режиссер и мультпродюсер, создавший такие яркие и популярные
                        мультфильмы, как "Унесенные призраками"
                        и "Принцесса Мононоке". Его работы отличаются красочной анимацией, глубоким сюжетом и
                        философским подтекстом, что делает
                        его фильмы исключительными и незабываемыми.</p>
                </div>
                <img class="imgg1" src="{{asset('img/Group 134.png')}}" alt="">
            </div>
            <div class="img-text">

                <img class="imgg2" src="{{asset('img/Rectangle 15 (1).png')}}" alt="">
                <div class="textt">
                    <p class="blue2">Тосио Судзуки</p>
                    <p class="black2">Тошио Судзуки (1948- ) - японский продюсер и бывший президент анимационной студии
                        Studio Ghibli. Он сотрудничал с такими
                        великими режиссерами, как Хаяо Миядзаки и Исао Такахата, помогая им создавать непревзойденные
                        произведения искусства в
                        жанре анимации. Благодаря его руководству и таланту, Studio Ghibli стала одной из самых
                        уважаемых и популярных
                        анимационных студий в мире.</p>
                </div>

            </div>


        </div>
        <div class=" container2">
            <img class="k1" src="{{asset('img/image_24-zbMKmuUtf-transformed 1.png')}}" alt="">
            <img class="k2" src="{{asset('img/image_24-zbMKmuUtf-transformed 1.png')}}" alt="">
            <img class="k3" src="img/image_24-zbMKmuUtf-transformed 1.png" alt="">
            <img class="k4" src="img/image_24-zbMKmuUtf-transformed 1.png" alt="">
            <img class="k5" src="img/image_24-zbMKmuUtf-transformed 1.png" alt="">
            <img class="k6" src="img/image_24-zbMKmuUtf-transformed 1.png" alt="">
            <img class="k7" src="img/image_24-zbMKmuUtf-transformed 1.png" alt="">

            <div class="block">
                <p class="year2">1983</p>
                <p class="text2">«Студия Гибли» фактически появилась в 1983 году, при создании фильма «Навсикая из
                    долины Ветров»</p>
            </div>

            <div class="block">
                <p class="year2">в 1988</p>
                <p class="text2">Широкую известность студии принесли фильмы «Мой сосед Тоторо» и «Могила светлячков»</p>
            </div>

            <div class="block">
                <p class="year2">до 1991</p>
                <p class="text2">Президент Topcraft Тору Хара был президентом «Студии Гибли»</p>
            </div>

            <div class="block">
                <p class="year2">В 2014</p>
                <p class="text2">Инсайдер на японском сайте News Cafe сообщил, что «Воспоминания Марни» станет последней
                    работой студии и она готовится
                    распустить свой штат.</p>
            </div>

            <div class="block">
                <p class="year2">28 ноября 2017</p>
                <p class="text2">Кодзи Хосино ушёл с поста президента; его заменил Киёфуми Накадзима</p>
            </div>

            <div class="block">
                <p class="year2">1 ноября 2022</p>
                <p class="text2">В Нагакуте открыт парк развлечений</p>
            </div>

            <div class="block">
                <p class="year2">В 2023</p>
                <p class="text2">Кодзи Хосино объявил об отставке с поста председателя Studio Ghibli; его заменил Тосио
                    Судзуки</p>
            </div>
        </div>


    </section>
    <img class="tree" src="img/Без названия (5) 1.png" alt="">


    <section class="end-block">
        <div class="part1">
            <img class="princes" src="img/Rectangle 16.png" alt="">
            <div class="flex2">
                <p class="info-text1">«Небесный замок Лапута»</p>
                <p class="info-text2">
                    Захватывающий и фантастический мультфильм студии Ghibli, рассказывающий о приключениях маленькой
                    девочки Паз,
                    стремящейся разгадать тайны легендарного летающего замка и спасти его от злых сил.</p>

            </div>

        </div>

        <div class="part2">

            <div class="a">
                <img class="chu" src="img/Chu and chibi-PhotoRoom 1.png" alt="">
                <p class="p11">Фильмография</p>
                <p class="p2">Мир, полный радости, ужаса и сострадания</p>
                <bottom class="long-film2">Посмотреть Подробнее</bottom>
            </div>
            <div class="b">
                <p class="aa">«Принцесса Мононоке»</p>
                <p class="bb">
                    Единственное верное решение для народа эмиси — отправить Аситаку на запад, чтобы узнать, что же
                    превратило бога-вепря в
                    такое свирепое чудовище.
                </p>
            </div>
            <div class="c">
                <img src="img/Rectangle 14.png" alt="">
            </div>
            <div class="d">
                <p class="ab">«Ветер крепчает»</p>
                <img class="r15" src="img/Rectangle 15.png" alt="">
                <p class="ab2">«Опомнитесь, люди! Остановитесь!»</p>
            </div>
        </div>
        <div class="part3">
            <div class="a4"></div>
            <div class="a5">
                <img class="G1" src="img/f.png" alt="">
                <p class="G2">«Могила светлячков»</p>
            </div>
            <div class="a6">
                <p class="b4">
                    "Могила светлячков" повествует о сильной связи истинной любви и преодолении трудностей в непростые
                    времена Второй
                    мировой войны.
                </p>
            </div>
        </div>
        <div class="part4">
            <div>
                <img class="imgg9" src="img/Rectangle 17.png" alt="">
            </div>
            <div class="divv">
                <p class="pp">«Ходячий замок»</p>
                <p class="pp2">Один из самых известных и удивительных мультфильмов студии Ghibli, созданный Хаяо
                    Миядзаки.</p>
            </div>
            <div class="divv2">
                <p class="pp3">
                    Эта фантастическая история о молодой девушке по имени Софи, которая попадает в волшебный мир, где
                    знакомится с
                    загадочным ходячим замком и его эксцентричным владельцем, провоцирует воображение и погружает
                    зрителя в удивительную и
                    магическую атмосферу приключений.
                </p>
            </div>
        </div>
        <div class="dragon"><img class="dragon2" src="img/Без названия (4) 1.png" alt=""></div>
    </section>

    @include('layouts.footer')
@endsection
