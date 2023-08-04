
{{-- Макеты страницы --}}
@extends('app_layout')


{{-- Содержания страницы --}}
@section('content')

<h4> Пользователь:
    @auth
     {{-- Пользователь аутентифицирован ... --}}
    {{ Auth::user()->name }}
    @endauth
    @guest
        {{-- Пользователь не аутентифицирован ... --}}
        [гость]
    @endguest
</h4>


<!-- Форма поиска имени студентов -->
<h3> Student Search Form  </h3>
<form action="" method="post">
    @csrf
    Name: <input type="text" name="find_name">
    <input type="submit" value="Send">
    <input type="hidden" name="action" value="find">
</form>


<h3>Таблица студентов (Blade):</h3>
    <table class="table table-bordered table-sm table-hover">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Group</th>
            <th>Edit</th>
            <th>Upload Image</th>
        </tr>
        {{-- Цикл отображения студентов  --}}
        @foreach ($products_array as $product)
        <tr>
            <td>
                {{$product->id}}
            </td>
            <td>
                {{$product->name}}
            </td>
            <td>{{$product->price}}</td>
            <td>{{$product->rate}}</td>
        </tr>
        @endforeach

    </table>






@endsection
