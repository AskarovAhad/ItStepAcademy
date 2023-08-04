@extends('layouts.app')

@section('content')
    @if (Auth::user()->status == 'admin')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="http://localhost/exam2/public/add_new_user" method="post">
            @csrf
            <h1>Add New User Form</h1>
            <div class="input-group mb-3">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter User Email">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="password" id="password" class="form-control" placeholder="Enter User Password">
            </div>

            <div class="input-group-prepend">
                <button class="btn btn-success" type="submit">Add New User</button>
            </div>
        </form>

        <h2>Users Table</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_info as $info)
                    <tr>
                        <th scope="row">{{ $info->id }}</th>
                        <td>
                            <a href="http://localhost/exam2/public/profile/{{ $info->id }}">
                                {{ $info->name }}
                            </a>
                        </td>
                        <td>{{ $info->email }}</td>
                        <td>
                            <input type="hidden" name="user_id" id="user_id" value="{{ $info->id }}">
                            <form action="http://localhost/exam2/public/update_user_status" method="post">
                                @csrf
                                <select class="form-select" aria-placeholder="Choose User Status" name="user_status"
                                    id="user_status">
                                    @if ($info->status == 'admin')
                                        <option value="admin" selected>admin</option>
                                        <option value="author">author</option>
                                        <option value="user">user</option>
                                    @endif
                                    @if ($info->status == 'author')
                                        <option value="admin">admin</option>
                                        <option value="author" selected>author</option>
                                        <option value="user">user</option>
                                    @endif
                                    @if ($info->status == 'user')
                                        <option value="admin">admin</option>
                                        <option value="author">author</option>
                                        <option value="user" selected>user</option>
                                    @endif
                                </select>
                                <button class="btn btn-success" type="submit">Update Role</button>
                            </form>
                        </td>
                        <td>
                            @if ($info->is_banned == 0)
                                <h5>Not Banned</h5>
                                <form action="http://localhost/exam2/public/ban_user" method="post">
                                    @csrf
                                    <input type="hidden" name="user_name" id="user_name" value="{{ $info->name }}">
                                    <button class="btn btn-danger" type="submit">Ban</button>
                                </form>
                            @else
                                <h5>Banned</h5>
                                <form action="http://localhost/exam2/public/unban_user" method="post">
                                    @csrf
                                    <input type="hidden" name="user_name" id="user_name" value="{{ $info->name }}">
                                    <button class="btn btn-success" type="submit">Unban</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form action="http://localhost/exam2/public/delete_user" method="post">
                                @csrf
                                <input type="hidden" name="user_name" id="user_name" value="{{ $info->name }}">
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
