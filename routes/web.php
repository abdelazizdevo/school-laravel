<?php

use Illuminate\Support\Facades\Route;


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
Route::middleware(['auth'])->group(function () {
    Route::get( '/', function (){
        return view('welcome');
    });

    Route::match(['get', 'post'], '/students', [\App\Http\Controllers\StudentController::class, 'List']);
    Route::get('/students/delete/{ID}', function ($ID){
        \App\Models\Student::find($ID)->delete();
        return back()->withInput();

    });
    Route::get('/sections/delete/{ID}', function ($ID){
        \App\Models\Section::find($ID)->delete();
        return back()->withInput();
    });


    Route::match(['get', 'post'], '/students/report/{ID}', [\App\Http\Controllers\StudentController::class, 'Report']);
    Route::match(['get', 'post'], '/sections', [\App\Http\Controllers\SectionController::class, 'List']);
    Route::match(['get', 'post'], '/attendance', [\App\Http\Controllers\AttendanceController::class, 'List']);


    Route::get('/users', [\App\Http\Controllers\UserController::class, 'list']);
    Route::match(['get', 'post'], '/users/add', [\App\Http\Controllers\UserController::class, 'add']);
    Route::match(['get', 'post'], '/users/edit/{ID}', [\App\Http\Controllers\UserController::class, 'edit']);
    Route::get('/users/delete/{ID}', [\App\Http\Controllers\UserController::class, 'delete']);

    Route::match(['get', 'post'], '/permissions', [\App\Http\Controllers\PermissionController::class, 'index']);

});

Route::match(['get', 'post'], '/login/', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout/', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
