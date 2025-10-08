<?php

use App\Modules\Product\Features\CreateProduct\Controllers\CreateProductController;
use App\Modules\Product\Features\GetProduct\Controllers\GetProductController;
use App\Modules\Product\Features\ListProducts\Controllers\ListProductsController;
use Illuminate\Support\Facades\Route;



Route::prefix('api/products')->group(function () {
    Route::post('/', CreateProductController::class)->name('products.create');
    Route::get('/', ListProductsController::class)->name('products.list');
    Route::get('/{id}', GetProductController::class)->name('products.get');
});