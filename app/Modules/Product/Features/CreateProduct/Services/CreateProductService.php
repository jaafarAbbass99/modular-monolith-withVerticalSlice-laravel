<?php

namespace App\Modules\Product\Features\CreateProduct\Services;

use App\Modules\Product\Shared\DTOs\ProductDTO;
use App\Modules\Product\Shared\Repositories\ProductRepository;

class CreateProductService
{
    public function __construct(
        private ProductRepository $productRepository
    )
    {}

    public function execute(array $data)
    {
        $productDTO = new ProductDTO(
            name: $data['name'],
            description: $data['description'],
            price: $data['price'],
            stock: $data['stock'],
            category: $data['category']
        );

        return $this->productRepository->create($productDTO);
    }   
}