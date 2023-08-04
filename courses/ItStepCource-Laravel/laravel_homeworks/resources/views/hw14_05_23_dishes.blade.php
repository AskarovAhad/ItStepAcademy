<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="dish">
            @foreach($dishes_arr as $dish)
                <a href="http://localhost/laravel_homeworks/public/hw14_05_23/dish/{{$dish->id}}">
                <img src="{{$dish->img}}" class="image">
                <h2>{{$dish->name}}</h1>
                </a>
            <hr>
        </div>
        @endforeach
    </div>
</body>
</html>

<style>
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .image{
        width: 200px;
        height: 200px;
    }
    .dish{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    hr{
        min-width: 100%;
    }
</style>
