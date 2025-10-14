<?php

namespace App\Modules\Order\Shared\DTOs;

class OrderItemDTO
{
    public function __construct(
        public int $productId,
        public int $quantity,
        public float $unitPrice,
    ) {}

}