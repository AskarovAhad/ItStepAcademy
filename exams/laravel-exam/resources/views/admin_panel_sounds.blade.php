@extends('layouts.app')

@section('content')
    @if(Auth::user()->status == 'admin')
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

                    <td>
                        <form action="http://localhost/exam2/public/change_sound_genre" method="post">
                            <input type="hidden" name="sound_id" id="sound_id" value="{{ $info->sound_id }}">
                            @csrf
                            <select class="form-select" name="genre" id="genre">
                                @foreach ($genre_list as $genre)
                                    <option value="{{ $genre->id }}" @if ($genre->genre_name == $info->genre_name) selected @endif>
                                        {{ $genre->genre_name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success">Update Genre</button>
                        </form>
                    </td>

                    <td>{{ $info->name }}</td>

                    <td>
                        @if ($info->is_accepted == 0)
                            <button type="button" class="btn btn-warning">Not Accepted</button>
                        @else
                            <button type="button" class="btn btn-success">Accepted</button>
                        @endif
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
    @else
        <h2>Only Admins May Enter Here</h2>
    @endif
@endsection


<style>
    img {
        max-width: 150px;
        max-height: 150px;
    }
</style>
