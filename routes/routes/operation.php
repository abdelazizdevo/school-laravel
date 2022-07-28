<?php
Route::match(['post','get'], '/operation/prices', [\App\Http\Controllers\PriceController::class, 'list']);
Route::match(['post','get'], '/operation/prices/add', [\App\Http\Controllers\PriceController::class, 'add']);
Route::match(['post','get'], '/operation/prices/edit/{ID}', [\App\Http\Controllers\PriceController::class, 'edit']);
