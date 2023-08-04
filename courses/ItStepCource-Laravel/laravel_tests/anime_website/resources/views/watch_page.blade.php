<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AniWaveWatch</title>
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
    @foreach ($data_arr as $data)
        {{$data->name}}
        {{$data->description}}
    @endforeach
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
        background: linear-gradient(to bottom, #000033, #660066) no-repeat;
        height: 1000px;
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
</style>
