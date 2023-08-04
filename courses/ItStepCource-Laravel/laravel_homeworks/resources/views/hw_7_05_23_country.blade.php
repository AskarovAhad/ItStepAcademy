<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($country_arr as $country)
        <a href="http://localhost/laravel_homeworks/public/hw7_05_23/countries/{{$country->id}}">{{$country->name}}</a>
    @endforeach
</body>
</html>
