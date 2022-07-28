<?php
Route::match(['post','get'], '/profit-sheet', [\App\Http\Controllers\ProfitSheetController::class, 'View']);

Route::get('/profit-sheet/confirm-actual/{trip_ID}', [\App\Http\Controllers\ProfitSheetController::class, 'ConfirmActual']);
