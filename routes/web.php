<?php

use App\Http\Controllers\StudentMarkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Auth::routes();
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth:web'], function () {

    Route::get("/st/logout", [StudentsController::class, 'logout'])->name('student.logout');
    Route::get("/student", [StudentsController::class, 'get'])->name('student.get');
    Route::post("/student", [StudentsController::class, 'store'])->name('student.store');
    Route::get("/student/edit/{id}", [StudentsController::class, 'edit'])->name('student.edit');
    
    Route::post("/student/update", [StudentsController::class, 'update'])->name('student.update');
    Route::post("/student/delete", [StudentsController::class, 'destroy'])->name('student.delete');

    Route::get("/mark", [StudentMarkController::class, 'get'])->name('mark.get');
    Route::post("/mark", [StudentMarkController::class, 'store'])->name('mark.store');
    Route::get("/mark/edit/{id}", [StudentMarkController::class, 'edit'])->name('mark.edit');
    
    Route::post("/mark/update", [StudentMarkController::class, 'update'])->name('mark.update');
    Route::post("/mark/delete", [StudentMarkController::class, 'destroy'])->name('mark.delete');
});
