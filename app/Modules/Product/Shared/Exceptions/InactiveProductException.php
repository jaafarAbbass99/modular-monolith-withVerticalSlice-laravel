<?php

namespace App\Modules\Product\Shared\Exceptions;

use Exception;

class InactiveProductException extends Exception
{
    public function __construct(int $productId)
    {
        return Parent::__construct(
            "Product with ID {$productId} is inactive and cannot be used. ",
            403
        );
    }
}
