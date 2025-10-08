<?php

namespace App\Modules\Order\Shared\Exceptions;

use Exception;

class OrderException extends Exception
{
    public function __construct(string $message = "Order module error", int $code = 400)
    {
        parent::__construct($message, $code);
    }
}