
{{-- Макеты страницы --}}
{{-- @extends('app_layout') --}}


{{-- Содержания страницы --}}
{{-- @section('content') --}}



<h3>Studets Table (Blade Export PDF):</h3>
    <table border="1" style="border-collapse: collapse" >
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Group</th>
        </tr>

        {{-- Цикл отображения студентов  --}}
        @foreach ($students_array as $student)
        <tr>
            <td>
                @if ($student->image_file)
                    <img width="50" src="data:image/png;base64, {{$student->image_file}}" />
                @endif
                {{-- <img src="/student_images/photo_{{$student->id}}.png" width="50px"> --}}
            </td>
            <td>{{$student->name}}</td>
            <td>{{$student->surname}}</td>
            <td>{{$student->age}}</td>
            <td>{{$student->group->group_name ?? '--'}}</td>
        </tr>
        @endforeach

    </table>



{{-- @endsection --}}
