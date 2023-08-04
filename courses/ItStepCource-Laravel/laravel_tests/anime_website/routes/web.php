<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AniWaveController;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/aniWave',[AniWaveController::class,'main_page']);
Route::any('/aniWave/search/{search}',[AniWaveController::class,'search_title']);
Route::any('/aniWave/watch/{title}',[AniWaveController::class,'watch_title']);
