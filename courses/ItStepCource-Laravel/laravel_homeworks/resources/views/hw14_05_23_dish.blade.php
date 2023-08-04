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
            @foreach($dish_arr as $dish)
                <img src="{{$dish->img}}" class="image">
                <h1>{{$dish->name}}</h1>
                <h2>ОПИСАНИЕ</h2>
                <h4>{{$dish->description}}</h4>
                <h2>РЕЦЕПТ</h2>
                <h4>{{$dish->recipy}}</h4>
            </a>
        </div>
    @endforeach
    </div>
    <a href="http://localhost/laravel_homeworks/public/hw14_05_23/dishes">НАЗАД</a>
</body>
</html>

<style>
    .container{
        width: 100%;
        display: flex;
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
</style>
