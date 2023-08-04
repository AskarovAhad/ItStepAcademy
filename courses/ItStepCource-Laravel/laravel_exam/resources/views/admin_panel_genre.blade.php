@extends('layouts.app')

@section('content')
@if (Auth::user()->status == 'admin')
    <form action="http://localhost/exam2/public/add_new_genre" method="post">
        @csrf
        <h1>Add New Genre Form</h1>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-success" type="submit">Add New Genre</button>
            </div>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter New Genre Name" aria-describedby="basic-addon1">
        </div>
    </form>
    <h2>Genres Table</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_info as $info)
                <tr>
                    <th scope="row">{{ $info->id }}</th>
                    <td>{{ $info->genre_name }}</td>
                    <td>
                        <form action="http://localhost/exam2/public/delete_genre" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $info->id }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        {{-- Only Users --}}
        <h1>This page for admins only</h1>
    @endif
@endsection
