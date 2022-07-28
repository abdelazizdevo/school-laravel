<?php
Route::match(['post','get'], '/bank-sheet', [\App\Http\Controllers\BankSheetController::class, 'View']);
