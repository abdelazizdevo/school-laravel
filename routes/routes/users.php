<?php
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'list']);
Route::match(['get', 'post'],'/users/add', [UserController::class, 'add']);
Route::match(['get', 'post'],'/users/edit/{ID}', [UserController::class, 'edit']);
Route::get('/users/delete/{ID}', [UserController::class, 'delete']);
