<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <h3>search</h3>
    <form action="http://localhost/laravel_homeworks/public/hw18_05_23/address_book_search" method="post" >
        @csrf
        name: <input type="text" name="name" id="name">
        <input value="search" type="submit">
        <input type="hidden" name="action" value="name">
    </form>
    <form action="http://localhost/laravel_homeworks/public/hw18_05_23/address_book_search" method="post" >
        @csrf
        surname: <input type="text" name="surname" id="surname">
        <input value="search" type="submit">
        <input type="hidden" name="action" value="surname">
    </form>
    <form action="http://localhost/laravel_homeworks/public/hw18_05_23/address_book_search" method="post" >
        @csrf
        address: <input type="text" name="addr" id="addr">
        <input value="search" type="submit">
        <input type="hidden" name="action" value="addr">
    </form>
    <form action="http://localhost/laravel_homeworks/public/hw18_05_23/address_book_search" method="post" >
        @csrf
        phone number: <input type="text" name="phone" id="phone">
        <input value="search" type="submit">
        <input type="hidden" name="action" value="phone">
    </form>

    <br><br>
    <a href="http://localhost/laravel_homeworks/public/hw18_05_23/address_book">MAIN PAGE</a>
    <br>    
    @foreach($address_arr as $arr)
        {{$arr->name}} | {{$arr->surname}} | {{$arr->phone}} | {{$arr->address}}
        <br>
    @endforeach
</body>
</html>
