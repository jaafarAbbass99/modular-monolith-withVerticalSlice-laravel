<?php

namespace App\Modules\Product\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register module services
    }

    public function boot(): void
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Routes/ProductWeb.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/ProductApi.php');
        
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        
        // Load views if needed
        // $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'Product');
    }
}