<?php

namespace App\Modules\Product\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/product.php', 'product'
        );
    }

    public function boot(): void
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Routes/ProductWeb.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/ProductApi.php');
        
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->publishes([
            __DIR__ . '/../Config/product.php' => config_path('product.php'),
        ], 'product-config');
        
        // Load views if needed
        // $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'Product');
    }
}