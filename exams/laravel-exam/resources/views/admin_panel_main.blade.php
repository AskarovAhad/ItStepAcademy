@extends('layouts.app')

@section('content')
    @if (Auth::user()->status == 'admin')
        <div class="links">
            <h2> <a href="http://localhost/exam2/public/admin_panel/admin_genres">Admin All Genres</a> </h2>
            <br>
            <h2> <a href="http://localhost/exam2/public/admin_panel/admin_users">Admin Users</a> </h2>
            <br>
            <h2> <a href="http://localhost/exam2/public/admin_panel/admin_sounds">Admin Sounds</a> </h2>
            <br>
            <h2> <a href="http://localhost/exam2/public/admin_panel/admin_requests_appeals">Requests and Appeals</a> </h2>
        </div>
    @else
        <h2>Only Admins May Enter Here</h2>
    @endif
@endsection

<style>
    .links {
        display: flex;
        align-content: center;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
</style>
