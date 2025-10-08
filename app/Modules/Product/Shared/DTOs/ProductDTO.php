<?php

namespace App\Modules\Product\Shared\DTOs;

class ProductDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public float $price,
        public int $stock,
        public string $category
    ) {}
}