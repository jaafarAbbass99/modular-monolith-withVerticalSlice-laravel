<?php

namespace App\Modules\Product\Shared\Exceptions;

use Exception;

class NotInStockProductException extends Exception
{
    public function __construct(int $productName)
    {
        return Parent::__construct(
            "Product {$productName} is out of stock. ",
            409
        );
    }
}
