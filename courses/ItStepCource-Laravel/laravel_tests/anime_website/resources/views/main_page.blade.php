<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <title>AniWaveMAIN</title>
</head>
<body>
    <header>
        <h1 class="header_logo">AniWave</h1>
        <div class="header-container-links">
            <a href="">Манга</a>
            <a href="">Ранобе</a>
            <form action=""></form>
        </div>
    </header>
    <h2>смотреть</h2>
    <main>
        <div class="main-cards-list">
            @foreach ($data_arr as $data)
                <div class="main-card">
                    <div class="main-card-bg-img" style="
                        position: absolute;
                        top: 0;
                        left: 0;
                        z-index: -1;
                        border-radius:20px;
                        min-width: 100%;
                        height: 100%;
                        filter: blur(10px) brightness(0.4);
                        background-image: url({{$data->img}});
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center center;
                    ">
                    </div>
                    <img src="{{$data->img}}" alt="">
                    <div class="main-card-info">
                        <div class="main-card-info-header">
                            <a href="http://localhost/exam/public/aniWave/watch/{{$data->link}}"><h5>{{$data->title_rus_name}}</h5></a>
                            <p style="font-size: 13px; padding-top: 5px;">{{$data->studio}}</p>
                        </div>
                        <div class="main-title-add-info">
                            {{$data->type}}<br>
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>{{$data->rating}} <br>
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg>{{$data->views}}  <br>
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                            <i class="fa-regular fa-sparkles"></i>{{$data->exited_episodes}}/{{$data->all_episodes}}  <br>
                            @if ($data->status == 1) Завершен
                            @else Онгоинг
                            @endif
                        </div>
                        <div class="main-card-info-description"><p>{{$data->description}}</p></div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
    *{
        margin: 0;
        padding: 0;
        font-family: 'Ubuntu', sans-serif;
        color: white;
    }
    body{
        background: linear-gradient(to bottom, #000033, #660066);
    }
    a{
        text-decoration: none;
        color: rgb(49, 99, 186);
    }

    header{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* MAIN */

    main{
        width: 100%;
        min-height: 1px;
        padding-top: 50px;
        display: flex;
    }

    .main-cards-list{
        padding-left: 100px;
        display: flex;
        flex-direction: column;
    }
    .main-card{
        margin-top: 25px;
        padding: 10px;
        display: flex;
        align-items: flex-start;
        border-radius: 10px;
        max-width: 700px;
        height: 267px;
        position: relative;
    }
    .main-card-info{
        padding-left: 10px;
    }
    .main-card-info h5{
        font-weight:600;
        font-size: 25px
    }
    .main-card-info-description{
        padding-top: 5px;
        font-size: 16px;
        word-break: break-all;
        word-wrap: break-word;
        overflow: hidden;
        display: table;
    }
    .main-title-add-info{
        padding-top: 8px;
        font-size: 16px;
    }
    .main-card img{
        border-radius: 10px;
        max-width: 200px;
        height: 100%;
    }
</style>
