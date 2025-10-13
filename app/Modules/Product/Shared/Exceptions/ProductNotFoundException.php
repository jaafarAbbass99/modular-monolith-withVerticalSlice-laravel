<?php

namespace App\Modules\Product\Shared\Exceptions;

use Exception;

class ProductNotFoundException extends Exception
{
    public function __construct(int $productId)
    {
        return Parent::__construct(
            "Product with ID {$productId} was not found.",
            404
        );
    }
}
