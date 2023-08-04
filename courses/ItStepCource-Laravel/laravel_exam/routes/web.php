<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoundCatalogController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::any('/home', [HomeController::class, 'home'])->name('home');
Route::any('/profile/{user}', [HomeController::class, 'profile']);

Route::post('/search_sound', [HomeController::class, 'search_sound']);
Route::post('/del_sound',[HomeController::class,'delete_sound']);
Route::post('/add_sound',[HomeController::class,'add_sound']);
Route::post('/change_visibility_sound',[HomeController::class,'change_visibility_sound']);
Route::post('/edit_sound',[HomeController::class,'edit_sound']);
Route::post('/appeal/{sound_id}',[HomeController::class,'appeal_sound']);
Route::post('/send_appeal_sound',[HomeController::class,'send_appeal_sound']);
Route::post('/appeal_sound_done',[HomeController::class,'appeal_sound_done']);

Route::any('/admin_panel_main',[HomeController::class,'admin_panel_main']);
Route::any('/admin_panel/{action}',[HomeController::class, 'admin_panel']);

Route::post('/delete_genre',[HomeController::class,'delete_genre']);
Route::post('/add_new_genre',[HomeController::class,'add_new_genre']);
Route::post('/change_sound_genre',[HomeController::class,'change_sound_genre']);
Route::post('/accept_sound',[HomeController::class,'accept_sound']);

Route::post('/ban_user',[HomeController::class,'ban_user']);
Route::post('/unban_user',[HomeController::class,'unban_user']);
Route::post('/delete_user',[HomeController::class,'delete_user']);
Route::post('/add_new_user',[HomeController::class,'add_user']);
Route::post('/update_user_status',[HomeController::class,'update_user_status']);
