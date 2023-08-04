<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($posts_arr as $info)
    <div class="container">
        <img src="http://localhost/laravel_homeworks/public/post_images/{{$info->img}}" alt="">
        <h2>{{$info->name}}</h2>
    </div>
        <br>
        <hr>
    @endforeach

    <form action="http://localhost/laravel_homeworks/public/hw25_05_23/newpost" method="POST" enctype="multipart/form-data">
        @csrf
        Название объявления: <input type="text" name="name" id="name">
        <br>
        Выберите картинку: <input type="file" name="image">
        <br>
        <button type="submit" class="btn btn-success">Upload</button>
    </form>

</body>
</html>

<style>
    img{
        max-width: 200px;
        max-height: 200px;
    }
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
</style>
