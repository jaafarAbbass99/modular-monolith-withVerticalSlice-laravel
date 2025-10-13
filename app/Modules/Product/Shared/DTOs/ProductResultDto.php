<?php

namespace App\Modules\Product\Shared\DTOs;

class ProductResultDto
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly float $price,
    ) {}
    
}