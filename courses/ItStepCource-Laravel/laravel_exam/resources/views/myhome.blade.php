@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (Auth::user()->status == 'admin')
                <div class="admin_acts">
                    @if ($user_data_arr[0]->is_banned == 0)
                        <form action="http://localhost/exam2/public/ban_user" method="post">
                            @csrf
                            <input type="hidden" name="user_name" id="user_name" value="{{$user_data_arr[0]->name}}">
                            <button type="submit" class="btn btn-danger">BAN</button>
                        </form>
                    @else
                        <form action="http://localhost/exam2/public/unban_user" method="post">
                            @csrf
                            <input type="hidden" name="user_name" id="user_name" value="{{$user_data_arr[0]->name}}">
                            <button type="submit" class="btn btn-success">UNBAN</button>
                        </form>
                    @endif
                    <form action="http://localhost/exam2/public/delete_user" method="post">
                        @csrf
                        <input type="hidden" name="user_name" id="user_name" value="{{$user_data_arr[0]->name}}">
                        <button type="submit" class="btn btn-success">DELETE USER</button>
                    </form>
                </div>
            @endif
            <div class="card-header">
                @if (Auth::user()->name == $user_data_arr[0]->name)
                    <h1> Welcome to urs profile </h1>
                @else
                    <h1> Welcome to {{ $user_data_arr[0]->name }}'s profile </h1>
                @endif
            </div>
            <h2>Name: {{ $user_data_arr[0]->name }} </h2>
            <h3>E-Mail: {{ $user_data_arr[0]->email }}</h3>
            <hr>
            @if ($user_data_arr[0]->is_banned == 1)
                <h1>You Are Banned!</h1>
            @endif
            @if (Auth::user()->name == $user_data_arr[0]->name &&
                    (Auth::user()->status == 'author' && $user_data_arr[0]->status == 'author') && $user_data_arr[0]->is_banned == 0)
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="http://localhost/exam2/public/add_sound" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-sm p-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Sound name</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm" id="sound_name" name="sound_name">
                    </div>
                    <select class="form-select p-2" aria-label="Default select example" name="genre" id="genre">
                        @foreach ($genre_list as $genre)
                            <option value="{{ $genre->id }}">
                                {{ $genre->genre_name }}</option>
                        @endforeach
                    </select>
                    <div class="custom-file p-2">
                        Choose Image:<input type="file" name="sound_img" id="sound_img" accept="image/*">
                    </div>
                    <div class="custom-file p-2">
                        Choose Sound:<input type="file" name="sound_file" id="sound_file" accept="audio/mp3">
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-info">Add New Sound</button>
                </form>
            @endif
            <h1>
                @if ($any_sounds == false && ($user_data_arr[0]->status == 'author' || $user_data_arr[0]->status == 'admin'))
                    @if (Auth::user()->name == $user_data_arr[0]->name)
                        You didn't uploaded any sounds.
                    @else
                        {{ $user_data_arr[0]->name }} didn't uploaded any sounds.
                    @endif
                @endif
            </h1>
            <div class="cards row">
                @for ($i = 0; $i < count($user_data_arr); $i++)
                    @if ($any_sounds == false)
                    @break;
                @endif
                @if (Auth::user()->name != $user_data_arr[0]->name &&
                        ($user_data_arr[$i]->is_show == 0 || $user_data_arr[$i]->is_accepted == 0))
                    @continue;
                @endif
                <div class="col pt-3 m-0">
                    <div id="mobile-box">
                        <!-- Card -->
                        <div class="card m-0 p-0 col">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img class="card-img-top"
                                    src="http://localhost/exam2/public/sound_images/{{ $user_data_arr[$i]->img }}"
                                    alt="Card image cap">
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="h5 font-weight-bold">{{ $user_data_arr[$i]->sound_name }}</h5>
                                <p class="mb-0"><a
                                        href="http://localhost/exam2/public/profile/{{ $user_data_arr[$i]->author_id }}">{{ $user_data_arr[$i]->name }}</a>
                                </p>
                                <p class="mb-0"><a href="">{{ $user_data_arr[$i]->genre_name }}</a>
                                </p>
                                <div class="container-audio">
                                    <audio controls>
                                        <source
                                            src="http://localhost/exam2/public/all_sounds/{{ $user_data_arr[$i]->file_name }}">
                                        Your browser does not Support the audio Tag
                                    </audio>
                                </div>
                            </div>
                            @if (Auth::user()->name == $user_data_arr[0]->name || Auth::user()->status == 'admin')
                                <form action="http://localhost/exam2/public/edit_sound" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">New sound
                                                name</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm" id="sound_name" name="sound_name"
                                            value="{{ $user_data_arr[$i]->sound_name }}">
                                    </div>
                                    <select class="form-select" name="genre" id="genre">
                                        @foreach ($genre_list as $genre)
                                            <option value="{{ $genre->id }}"
                                                @if ($genre->genre_name == $user_data_arr[$i]->genre_name) selected @endif>
                                                {{ $genre->genre_name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="sound_id" id="sound_id"
                                        value="{{ $user_data_arr[$i]->sound_id }}">
                                    <input type="hidden" name="default_sound_img" id="default_sound_img"
                                        value="{{ $user_data_arr[$i]->img }}">
                                    <input type="file" name="sound_img" id="sound_img" accept="image/*">
                                    <button type="submit" class="btn btn-info">Save Changes</button>
                                </form>
                                <form action="http://localhost/exam2/public/change_visibility_sound" method="post">
                                    @csrf
                                    @if ($user_data_arr[$i]->is_show == 1)
                                        <input type="hidden" id="is_show" name="is_show" value="0">
                                        <input type="hidden" id="sound_id" name="sound_id"
                                            value="{{ $user_data_arr[$i]->sound_id }}">
                                        <button type="submit" class="btn btn-danger" id="change_visibility"
                                            name="change_visibility" value="hide">HIDE</button>
                                    @else
                                        <input type="hidden" id="is_show" name="is_show" value="1">
                                        <input type="hidden" id="sound_id" name="sound_id"
                                            value="{{ $user_data_arr[$i]->sound_id }}">
                                        <button type="submit" class="btn btn-success" id="change_visibility"
                                            name="change_visibility" value="show">SHOW</button>
                                        @if ($user_data_arr[$i]->is_accepted == 0)
                                            <button type="button" class="btn btn-warning">Not Accepted</button>
                                        @else
                                            <button type="button" class="btn btn-success">Accepted</button>
                                        @endif
                                    @endif
                                </form>
                                <form action="http://localhost/exam2/public/del_sound" method="post">
                                    @csrf
                                    <input type="hidden" id="sound_id" name="sound_id"
                                        value="{{ $user_data_arr[$i]->sound_id }}">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="btn btn-danger" id="del"
                                                name="del" value="del">DEL</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                            <div class="card-sound-appeal d-flex">
                                <form action="http://localhost/exam2/public/appeal/{{$user_data_arr[$i]->sound_id}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{Auth::user()->id}}">
                                    <button type="submit" class="btn btn-secondary btn-sm">!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
@endsection


<style>
audio {
    width: 100%;
}

.container-audio {
    min-width: 100%;
    height: auto;
    border-radius: 5px;
    background-color: #eee;
    color: #444;
}

#mobile-box {
    max-width: 300px;
    min-width: 300px;
}

.card {
    -webkit-border-radius: 10px;
    border-radius: 10px;
}

.card .view {
    -webkit-border-top-left-radius: 10px;
    border-top-left-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    border-top-right-radius: 10px;
}

.card h5 a {
    color: #0d47a1;
}

.card h5 a:hover {
    color: #072f6b;
}
</style>
