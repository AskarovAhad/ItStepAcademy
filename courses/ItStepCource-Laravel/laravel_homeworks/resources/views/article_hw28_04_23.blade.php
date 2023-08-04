<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hw28_04_23</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>content</th>
        </tr>
        {{-- Цикл отображения студентов  --}}
        @foreach ($article_arr as $article)
        <tr>
            <td>{{ $article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->content}}</td>
        </tr>
        @endforeach

    </table>

</body>
</html>
