{{-- Макеты страницы --}}
@extends('app_layout')


{{-- Содержания страницы --}}
@section('content')

    <!-- Редактирования  студентов -->
    <h3> Student Edit Form  </h3>
    <form action="" method="post">
        Name: <input type="text" name="name" value="{{$student['name']}}">
        <br>
        Surname: <input type="text" name="surname" value="{{$student['surname']}}">
        <br>
        Age: <input type="text" name="age" value="{{$student['age']}}">
        <br>
        <input type="button" value="Send">
    </form>

@endsection
