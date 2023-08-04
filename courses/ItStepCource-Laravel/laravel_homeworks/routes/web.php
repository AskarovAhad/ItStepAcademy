<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HW23_04_23Controller;
use App\Http\Controllers\HW27_04_23Controller;
use App\Http\Controllers\HW28_04_23Comtroller;
use App\Http\Controllers\HW30_04_23Controller;
use App\Http\Controllers\HW4_04_23Controller;
use App\Http\Controllers\HW7_05_23Controller;
use App\Http\Controllers\HW11_05_23Controller;
use App\Http\Controllers\HW12_05_23Controller;
use App\Http\Controllers\HW14_05_23Controller;
use App\Http\Controllers\HW18_05_23Controller;
use App\Http\Controllers\HW25_05_23Controller;
use App\Http\Controllers\HW26_05_23Controller;
use App\Http\Controllers\HW28_05_23Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/hw23_04_23', [HW23_04_23Controller::class, 'hw23_04_23']);

Route::any('/hw27_04_23/{what_to_do}', [HW27_04_23Controller::class, 'hw27_04_23']);

Route::any('/articles',[HW28_04_23Comtroller::class, 'hw28_04_23']);

Route::any('/articles2',[HW30_04_23Controller::class, 'hw30_04_23']);

Route::any('/articles4',[HW4_04_23Controller::class, 'hw4_04_23']);

Route::any('/hw7_05_23/countries',[HW7_05_23Controller::class, 'hw7_05_23']);
Route::any('/hw7_05_23/countries/{city}',[HW7_05_23Controller::class, 'hw_7_05_23_city']);
Route::any('/hw7_05_23/countries/city/{landmarks}',[HW7_05_23Controller::class, 'hw_7_05_23_landmark']);

Route::any('/hw11_05_23/categories',[HW11_05_23Controller::class, 'hw11_05_23_categories']);
Route::any('/hw11_05_23/category_show/{id}',[HW11_05_23Controller::class, 'hw11_05_23_category_show']);
Route::any('/hw11_05_23/new_post',[HW11_05_23Controller::class, 'hw11_05_23_new_post']);

// http://laravel8/admin-panel
Route::any('/hw12_05_23/countries',[HW12_05_23Controller::class, 'hw12_05_23']);
Route::any('/hw12_05_23/countries/{city}',[HW12_05_23Controller::class, 'hw_12_05_23_city']);
Route::any('/hw12_05_23/countries/city/{landmarks}',[HW12_05_23Controller::class, 'hw_12_05_23_landmark']);
Route::any('/hw12_05_23/admin-panel',[HW12_05_23Controller::class,'hw12_05_23_admin_panel']);

Route::any('/hw14_05_23/dishes',[HW14_05_23Controller::class,'hw14_05_23_dishes']);
Route::any('/hw14_05_23/dish/{id}',[HW14_05_23Controller::class,'hw14_05_23_dish']);

Route::any('/hw18_05_23/address_book',[HW18_05_23Controller::class,'hw18_05_23']);
Route::any('/hw18_05_23/address_book_search',[HW18_05_23Controller::class,'hw18_05_23_search']);

Route::any('/hw25_05_23/show',[HW25_05_23Controller::class,'show']);
Route::any('/hw25_05_23/newpost',[HW25_05_23Controller::class,'newpost'])->name('newpost');

Route::any('/hw26_05_23/show',[HW26_05_23Controller::class,'show']);

Route::any('/hw28_05_23/show', [HW28_05_23Controller::class, 'show']);
