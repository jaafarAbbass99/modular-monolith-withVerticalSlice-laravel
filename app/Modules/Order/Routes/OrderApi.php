<?php

use App\Modules\Order\Features\CreateOrder\Controllers\CreateOrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/orders')->group(function () {
    Route::post('/', CreateOrderController::class)->name('orders.create');
    // Route::get('/', ListOrdersController::class)->name('orders.list');
    // Route::get('/{id}', GetOrderController::class)->name('orders.get');
});