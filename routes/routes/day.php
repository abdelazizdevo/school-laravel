<?php
Route::match(['post','get'], '/day/{ID}/{tab}', [\App\Http\Controllers\DayController::class, 'View']);
