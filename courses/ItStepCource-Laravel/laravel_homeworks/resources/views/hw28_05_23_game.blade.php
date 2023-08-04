<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Game Catalog
    </h1>
    <div class="main_flex">
        @foreach($data_arr as $game)
        <div class="child">
            <img width="200" src="{{$game->img_link}}">
            <p>{{$game->name}}</p>
            <p class="main_p">Genre</p>
            <p>{{$game->genre}}</p>
            <p class="main_p">Platform</p>
            <p>{{$game->platform}}</p>
            <p class="main_p">Rating</p>
            <p>{{$game->rating}}</p>
            <p class="main_p">Description</p>
            <p>{{$game->description}}</p>
            <p class="main_p">Date</p>
            <p>{{$game->date}}</p>
        </div>
        @endforeach
    </div>
</body>
</html>

<style>
    h1{
        text-align: center;
    }
    .main_flex{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-content: center;
        gap: 30px;
    }
    p{
        margin: 0;
        padding: 0;
    }
    .child{
        text-align: start;
        width: 200px;
    }
    .main_p{
        font-weight: bold;
    }
</style>

