<?php
Route::match(['post','get'], '/accounts', [\App\Http\Controllers\AccountantController::class, 'View']);

Route::match(['post','get'], '/transactions', [\App\Http\Controllers\TransactionController::class, 'List']);
