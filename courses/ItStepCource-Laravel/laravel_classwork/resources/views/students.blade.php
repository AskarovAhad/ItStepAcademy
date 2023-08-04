
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

<hr>



<h3>Таблица студентов:</h3>
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
        @foreach ($students_array as $student)
        <tr>
            <td>
                {{$student->id}}
            </td>
            <td>{{$student->name}}

                <!-- Редактирования имени студента -->
                <form action="" method="post" style="display: inline-block; ">
                    @csrf
                    <input type="text" name="name" size="10">
                    <input type="hidden" name="id" value="{{$student->id}}">
                    <input type="submit" value="save">
                    <input type="hidden" name="action" value="edit_name">
                </form>

            </td>
            <td>{{$student->surname}}</td>
            <td>{{$student->age}}</td>
            <td>{{$student->group->group_name ?? '--'}}</td>
            <td>
                <a href="/students/edit/{{$student->id}}">Edit</a>
            </td>

            {{-- Форма загрузки фото --}}
            <td>
                <form action="/students/photo_upload" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file_img" id="">
                    <input type="hidden" name="id" value="{{$student->id}}">
                    {{-- <br> --}}
                    <input type="submit" value="Send File">
                </form>
            </td>

        </tr>
        @endforeach

    </table>


    {{ $students_array->links() }}


<!-- Добавления новый студентов -->
<h3 class="mt-5" > New Student Form  </h3>
<form action="" method="post">
    @csrf
    Name: <input class="mb-2" type="text" name="name">
    <br>
    Surname: <input class="mb-2" type="text" name="surname">
    <br>
    Age: <input class="mb-2" type="text" name="age">
    <br>
    <input class="btn btn-primary mt-2" type="submit" value="Send">
    <input type="hidden" name="action" value="insert">
</form>




@endsection
