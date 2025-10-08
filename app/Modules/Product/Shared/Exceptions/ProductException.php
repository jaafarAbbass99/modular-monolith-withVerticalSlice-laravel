<?php

namespace App\Modules\Product\Shared\Exceptions;

use Exception;

class ProductException extends Exception
{
    public function __construct(string $message = "Product module error", int $code = 400)
    {
        parent::__construct($message, $code);
    }
}