{{-- Макеты страницы --}}
@extends('app_layout')


{{-- Содержания страницы --}}
@section('content')

<h4>пользователь:
    @auth
    {{Auth::user()->name}}
    @endauth

    @guest
    [гость]
    @endguest
</h4>

<h3 class="mt-5">search student form</h3>
<form action="" method="post" >
    @csrf
    name: <input type="text" name="find_name" id="find_name">
    <input value="send" type="submit" class="btn btn-primary mt-1">
    <input type="hidden" name="action" value="find">
</form>

<h3>Таблица студентов (Blade):</h3>
    <table class="table table-bordered table-sm table-hover">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Edit</th>
        </tr>
        {{-- Цикл отображения студентов  --}}
        @foreach ($students_array as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->surname}}</td>
            <td>{{$student->age}}</td>
            <td>
                <a href="/students/edit/{{$loop->index}}">Edit</a>
            </td>
        </tr>
        @endforeach

    </table>
        {{$students_array->links()}}
    <br>

    <form action="" method="post" style="display: inline-block; ">
        @csrf
          <input type="text" name="name" size="10">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        <input type="submit" value="save">
        <input type="hidden" name="action" value="edit_name">
    </form>
    <h3 class="mt-5">new student form</h3>
    <form action="" method="post" >
        @csrf
        Name: <input type="text" name="name" id="name" class="mt-1">
        <br>
        Surname <input type="text" name="surname" id="surname" class="mt-1">
        <br>
        age <input type="text" name="age" id="age" class="mt-1">
        <br>
        <input value="send" type="submit" class="btn btn-primary mt-1">
        <input type="hidden" name="action" value="insert">
    </form>

@endsection
