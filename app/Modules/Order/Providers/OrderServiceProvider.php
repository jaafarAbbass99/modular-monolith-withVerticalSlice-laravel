<?php

namespace App\Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register module services
    }

    public function boot(): void
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Routes/OrderWeb.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/OrderApi.php');
        
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        
        // Load views if needed
        // $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'Order');
    }
}