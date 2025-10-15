<?php

namespace App\Modules\Order\Shared\DTOs;

class OrderDTO
{
    public function __construct(
        public string $customerName,
        public string $customerEmail,
        public string $customerPhone,
        public float $totalAmount,
    ) {
    }
}