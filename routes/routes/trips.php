<?php
Route::match(['post','get'], '/trips/add', [\App\Http\Controllers\TripController::class, 'CreateNew']);
Route::match(['post','get'], '/trips/edit/{ID}', [\App\Http\Controllers\TripController::class, 'Edit']);

