<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/students', function () {
    return view('home');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Route::resource('students', StudentController::class);
// Route::put('/students/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
//Route::get('/students/update/{id}', [StudentController::class, 'showData'])->name('students.update');
//Route::post('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
//  Route::get('/form',[StudentController::class,'showForm']);
Route::match(['get', 'put', 'delete'], 'students/destroyAndRestore/{id}', [StudentController::class, 'destroyAndRestore']);

Route::post('students/storeAndUpdate', [StudentController::class,'storeAndUpdate']);