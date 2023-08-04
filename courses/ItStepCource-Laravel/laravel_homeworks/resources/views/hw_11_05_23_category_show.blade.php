<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($category_show_arr as $show)
        {{$show->name}} | {{$show->add_date}}
    <br>
    @endforeach
    <br><br><br>
    <form action="http://localhost/laravel_homeworks/public/hw11_05_23/new_post" method="post" >
        @csrf
        <h3>add new post</h3>
        name: <input type="text" name="title" id="title">
        <input type="hidden" name="category_id" id="category_id" value="{{$show->category_id}}">
        <input value="add" type="submit">
        <input type="hidden" name="action" value="insert">
    </form>
</body>
</html>
