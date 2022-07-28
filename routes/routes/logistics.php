<?php
Route::match(['post','get'], '/logistics/situation', [\App\Http\Controllers\LogisticsController::class, 'ViewSituation']);
