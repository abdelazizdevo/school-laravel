<?php
Route::match(['post','get'], '/safe-sheet', [\App\Http\Controllers\SafeSheetController::class, 'View']);
