<?php
Route::match(['post','get'], '/payment-invoices', [\App\Http\Controllers\PaymentInvoiceController::class, 'List']);
