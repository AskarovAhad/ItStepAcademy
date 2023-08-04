<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\StudentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// REST API пути

// http://laravel8/api/students - Путь к списку студентов
Route::get('/students', [StudentsController::class, 'students_list']);

// http://laravel8/api/student/5 - Инфо студента
Route::get('/student/{id}', [StudentsController::class, 'student_show']);

// http://laravel8/api/student_create - Создания студента
Route::post('/student_create', [StudentsController::class, 'student_create']);

// http://laravel8/api/student_update/5 - Обновления студента
Route::put('/student_update/{id}', [StudentsController::class, 'student_update']);

// http://laravel8/api/student_delete/5 - Удаления студента
Route::delete('/student_delete/{id}', [StudentsController::class, 'student_delete']);



