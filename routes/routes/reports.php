<?php
Route::get('/reports/guide', [\App\Http\Controllers\ReportController::class, 'GuideReport']);
Route::get('/reports/shopping', [\App\Http\Controllers\ReportController::class, 'ShoppingReport']);
Route::get('/reports/optional', [\App\Http\Controllers\ReportController::class, 'OptionalReport']);
Route::get('/reports/trans-provider', [\App\Http\Controllers\ReportController::class, 'TransProviderReport']);
