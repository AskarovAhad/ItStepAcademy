<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hw28_04_23</title>
</head>
<body>
    <form action="" method="post" >
        @csrf
        <h3>search by content</h3>
        content: <input type="text" name="find_acticle" id="find_acticle">
        <input value="send" type="submit">
        <input type="hidden" name="action" value="find_acticle">
    </form>
    <br><br>

    <form action="" method="post" >
        @csrf
        <h3>add new article</h3>
        title: <input type="text" name="title" id="title">
        content: <input type="text" name="content" id="content">
        <input value="send" type="submit">
        <input type="hidden" name="action" value="insert">
    </form>
    <br><br>

    <h3>article table</h3>
    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>content</th>
        </tr>
        {{-- Цикл отображения студентов  --}}
        @foreach ($article_arr as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->content}}</td>
            <td>
                <form action="" method="post">
                    @csrf
                    <input value="delete" type="submit">
                    <input type="hidden" name="id" id="id" value={{$article->id}}>
                    <input type="hidden" name="action" value="del">
                </form>
            </td>
            <td>
                <form action="" method="post">
                    @csrf
                    <input value="edit content" type="submit">
                    <input type="text" name="content" id="content">
                    <input type="hidden" name="id" id="id" value={{$article->id}}>
                    <input type="hidden" name="action" value="edit">
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>
