<?php
Route::match(['post','get'], '/settings/cities', [\App\Http\Controllers\CityController::class, 'List']);

Route::match(['post','get'], '/settings/currencies', [\App\Http\Controllers\CurrencyController::class, 'List']);


Route::match(['post','get'], '/settings/drivers', [\App\Http\Controllers\DriverController::class, 'List']);

Route::match(['post','get'], '/settings/tours', [\App\Http\Controllers\TourController::class, 'List']);


Route::match(['post','get'], '/settings/guides', [\App\Http\Controllers\GuideController::class, 'List']);


Route::match(['post','get'], '/settings/trans-providers', [\App\Http\Controllers\TransProviderController::class, 'List']);

Route::match(['post','get'], '/settings/trans-types', [\App\Http\Controllers\TransTypeController::class, 'List']);

Route::match(['post','get'], '/settings/trans-tours', [\App\Http\Controllers\TransTourController::class, 'List']);

Route::match(['post','get'], '/settings/tickets', [\App\Http\Controllers\TicketController::class, 'List']);


Route::match(['post','get'], '/settings/shopping', [\App\Http\Controllers\ShoppingController::class, 'List']);


Route::match(['post','get'], '/settings/tax-suppliers', [\App\Http\Controllers\TaxSupplierController::class, 'List']);


Route::match(['post','get'], '/settings/websites', [\App\Http\Controllers\WebsiteController::class, 'List']);

Route::match(['post','get'], '/settings/hotels', [\App\Http\Controllers\HotelController::class, 'List']);

