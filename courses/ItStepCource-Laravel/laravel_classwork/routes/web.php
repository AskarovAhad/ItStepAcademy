<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return "Hello Laravel World!!!";
});

// http://laravel8/students - Путь к списку студентов
Route::get('/students', [StudentsController::class, 'show']);
Route::post('/students', [StudentsController::class, 'show']);

// http://laravel8/students/edit - Путь к списку студентов
Route::get('/students/edit/{id}', [StudentsController::class, 'edit']);

// http://laravel8/students/photo_upload - Путь для загрузки файлов
Route::post('/students/photo_upload', [StudentsController::class, 'photo_upload']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// REST API Page
// http://laravel8/students_rest_ajax
Route::get('/students_rest_ajax', function () {
    return view('students_rest_ajax');
});


// Export to PDF route
Route::get('/students_pdf', [StudentsController::class, 'export_pdf']);


// Export to Excel route
Route::get('/students_excel', [StudentsController::class, 'export_excel']);


// http://laravel8/products - Путь к списку продуктов
Route::any('/products', [ProductsController::class, 'show']);
Route::post('/product_save', [ProductsController::class, 'save']);
