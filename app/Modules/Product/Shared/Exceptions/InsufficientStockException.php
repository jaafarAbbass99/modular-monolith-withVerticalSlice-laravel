<?php

namespace App\Modules\Product\Shared\Exceptions;

use Exception;

class InsufficientStockException extends Exception
{
    public function __construct(string $productName, int $availableStock, int $requestedQuantity)
    {
        return Parent::__construct(
            "Product '{$productName}' has insufficient stock.
            Available: {$availableStock}, Requested: {$requestedQuantity}.",
            409
        );
    }
}
