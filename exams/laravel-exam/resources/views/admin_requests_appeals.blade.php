@extends('layouts.app')

@section('content')
@if (Auth::user()->status == 'admin')


    <h1>Sound Accept Request</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Sound</th>
                <th scope="col">Name</th>
                <th scope="col">Genre</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_info as $info)
                <tr>
                    <th scope="row">{{ $info->sound_id }}</th>

                    <td><img src="http://localhost/exam2/public/sound_images/{{ $info->img }}"></td>

                    <td>
                        <audio src="http://localhost/exam2/public/all_sounds/{{ $info->file_name }}" controls></audio>
                    </td>

                    <td>{{ $info->sound_name }}</td>

                    <td>{{ $info->genre_name }}</td>

                    <td>{{ $info->name }}</td>

                    <td>
                        <button type="button" class="btn btn-warning">Not Accepted</button>
                        <form action="http://localhost/exam2/public/accept_sound" method="post">
                            @csrf
                            <input type="hidden" name="sound_id" id="sound_id" value="{{ $info->sound_id }}">
                            <button type="submit" class="btn btn-success">Accepted</button>
                        </form>
                    </td>

                    <td>
                        <form action="http://localhost/exam2/public/del_sound" method="post">
                            @csrf
                            <input type="hidden" name="sound_id" id="sound_id" value="{{ $info->sound_id }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <hr>
    <br>

    <h1>Appeals</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">From User</th>
                <th scope="col">On User</th>
                <th scope="col">On Sound</th>
                <th>Text</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appeals_arr as $info)
                <tr>
                    <th scope="row">{{ $info->id }}</th>
                    <td>{{$info->from}}</td>
                    <td>{{$info->to}}</td>
                    <td>{{$info->sound_id}}</td>
                    <td>{{$info->text}}</td>
                    <td>
                        <form action="http://localhost/exam2/public/appeal_sound_done" method="post">
                            @csrf
                            <input type="hidden" name="appeal_id" id="appeal_id" value="{{$info->id}}">
                            <button type="submit" class="btn btn-success">Match Done</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h1>For Admins Only</h1>
    @endif
@endsection

<style>
    img {
        max-width: 150px;
        max-height: 150px;
    }
</style>
