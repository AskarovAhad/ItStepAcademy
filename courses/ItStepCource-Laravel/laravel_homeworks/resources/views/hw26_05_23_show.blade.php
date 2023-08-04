<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3 class="header">Galery</h3>
<div class="main_flex">
    @foreach ($galery_array as $galery)
    <div>
        <img width="100" src="data:image/png;base64, {{$galery->image}}">
    </div>
    @endforeach
</div>


<form action="" method="post" enctype="multipart/form-data">
    @csrf
    File: <input type="file" name="file_img" id="file_img">
    <br>
    <input type="submit" value="Send">
    <input type="hidden" name="action" value="insert">
</form>


<style>
    .header{
        text-align: center;
        font-size: 60px;
    }
    .header1{
        text-align: center;
        font-size: 30px;
    }
    .main_flex{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-content: center;
        gap: 50px;
    }
    form{
        text-align: center;
    }
</style>

</body>
</html>
