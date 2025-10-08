@echo off
echo =============================================
echo Creating Modular Architecture Structure...
echo =============================================

REM Create Products Module Structure
mkdir app\Modules\Products\Features\CreateProduct\Controllers
mkdir app\Modules\Products\Features\CreateProduct\Requests
mkdir app\Modules\Products\Features\CreateProduct\Models
mkdir app\Modules\Products\Features\CreateProduct\Services
mkdir app\Modules\Products\Features\CreateProduct\Resources

mkdir app\Modules\Products\Features\GetProduct\Controllers
mkdir app\Modules\Products\Features\GetProduct\Requests
mkdir app\Modules\Products\Features\GetProduct\Models
mkdir app\Modules\Products\Features\GetProduct\Services
mkdir app\Modules\Products\Features\GetProduct\Resources

mkdir app\Modules\Products\Features\ListProducts\Controllers
mkdir app\Modules\Products\Features\ListProducts\Requests
mkdir app\Modules\Products\Features\ListProducts\Models
mkdir app\Modules\Products\Features\ListProducts\Services
mkdir app\Modules\Products\Features\ListProducts\Resources

mkdir app\Modules\Products\Shared\Models
mkdir app\Modules\Products\Shared\Repositories
mkdir app\Modules\Products\Shared\DTOs
mkdir app\Modules\Products\Shared\Exceptions
mkdir app\Modules\Products\Shared\Traits

REM Create Orders Module Structure
mkdir app\Modules\Orders\Features\CreateOrder\Controllers
mkdir app\Modules\Orders\Features\CreateOrder\Requests
mkdir app\Modules\Orders\Features\CreateOrder\Models
mkdir app\Modules\Orders\Features\CreateOrder\Services
mkdir app\Modules\Orders\Features\CreateOrder\Resources

mkdir app\Modules\Orders\Features\GetOrder\Controllers
mkdir app\Modules\Orders\Features\GetOrder\Requests
mkdir app\Modules\Orders\Features\GetOrder\Models
mkdir app\Modules\Orders\Features\GetOrder\Services
mkdir app\Modules\Orders\Features\GetOrder\Resources

mkdir app\Modules\Orders\Features\ListOrders\Controllers
mkdir app\Modules\Orders\Features\ListOrders\Requests
mkdir app\Modules\Orders\Features\ListOrders\Models
mkdir app\Modules\Orders\Features\ListOrders\Services
mkdir app\Modules\Orders\Features\ListOrders\Resources

mkdir app\Modules\Orders\Shared\Models
mkdir app\Modules\Orders\Shared\Repositories
mkdir app\Modules\Orders\Shared\DTOs
mkdir app\Modules\Orders\Shared\Exceptions
mkdir app\Modules\Orders\Shared\Traits

REM Create Shared Folders
mkdir app\Shared\Providers
mkdir app\Shared\Traits
mkdir app\Shared\Helpers

REM Create Routes and Database folders
mkdir app\Modules\Products\Routes
mkdir app\Modules\Orders\Routes
mkdir app\Modules\Products\Database\Migrations
mkdir app\Modules\Orders\Database\Migrations

echo =============================================
echo Structure created successfully!
echo =============================================
echo.
echo Next steps:
echo 1. Run: composer dump-autoload
echo 2. Add to config/app.php providers:
echo    App\Shared\Providers\ModuleServiceProvider::class
echo 3. Start coding in the created folders
echo.
pause