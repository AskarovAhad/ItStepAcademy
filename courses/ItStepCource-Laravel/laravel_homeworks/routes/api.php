<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HW21_05_23Controller;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hw21_05_23/articles', [HW21_05_23Controller::class, 'article_list']);
Route::post('/hw21_05_23/article_create', [HW21_05_23Controller::class, 'article_create']);
Route::put('/hw21_05_23/article_update/{id}', [HW21_05_23Controller::class, 'article_update']);
Route::delete('/hw21_05_23/article_delete/{id}', [HW21_05_23Controller::class, 'article_delete']);
Route::get('/hw21_05_23/article_find', [HW21_05_23Controller::class, 'article_find']);
