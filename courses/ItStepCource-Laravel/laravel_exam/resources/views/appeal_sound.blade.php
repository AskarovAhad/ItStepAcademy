@extends('layouts.app')

@section('content')
    <h1>Appilation on sound {{$data_arr[0]->sound_name}}</h1>
    <form action="http://localhost/exam2/public/send_appeal_sound" method="post">
        @csrf
        <div class="input-group mb-3 w-25">
            <input type="hidden" id="from" name="from" value="{{Auth::user()->name}}">
            <input type="hidden" id="to" name="to" value="{{$data_arr[0]->name}}">
            <input type="hidden" name="sound_id" id="sound_id" value="{{$data_arr[0]->sound_id}}">
            <div class="input-group-prepend">
              <button class="btn btn-success" type="submit">Send Appilation</button>
            </div>
            <input type="text" name="text" id="text" class="form-control" placeholder="Describe appilation">
        </div>
    </form>
    <div class="col pt-3 m-0">
        <div id="mobile-box">
            <!-- Card -->
            <div class="card m-0 p-0 col">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img class="card-img-top" src="http://localhost/exam2/public/sound_images/{{ $data_arr[0]->img }}" alt="Card image cap">
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body text-center">
                    <h5 class="h5 font-weight-bold">{{ $data_arr[0]->sound_name }}</h5>
                    <p class="mb-0"><a
                            href="http://localhost/exam2/public/profile/{{ $data_arr[0]->author_id }}">{{ $data_arr[0]->name }}</a>
                    </p>
                    <p class="mb-0"><a
                            href="http://localhost/exam2/public/search/{{ $data_arr[0]->genre_name }}">{{ $data_arr[0]->genre_name }}</a>
                    </p>
                    <div class="container-audio">
                        <audio controls>
                            <source src="http://localhost/exam2/public/all_sounds/{{ $data_arr[0]->file_name }}">
                            Your browser dose not Support the audio Tag
                        </audio>
                    </div>
                </div>
                <div class="card-sound-appeal d-flex">
                    <form action="http://localhost/exam2/public/appeal/{{$data_arr[0]->sound_id}}" method="post">
                        @csrf
                        <input type="hidden" value="{{Auth::user()->id}}">
                        <button type="submit" class="btn btn-secondary btn-sm">!</button>
                    </form>
                </div>
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

    html,
    body,
    .view {
        height: 100%;
    }

    #mobile-box {
        max-width: 320px;
        min-width: 320px;
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
