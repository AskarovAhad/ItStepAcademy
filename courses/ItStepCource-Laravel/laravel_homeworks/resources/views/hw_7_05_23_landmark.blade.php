<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($landmark_arr as $landmark)
        <a href="{{$landmark->landmark_info_link}}">{{$landmark->name}}</a>
    @endforeach
</body>
</html>
