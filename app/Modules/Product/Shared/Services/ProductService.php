<?php

namespace App\Modules\Product\Shared\Services;

use App\Modules\Product\Contracts\ProductServiceInterface;
use App\Modules\Product\Shared\DTOs\ProductResultDto;
use App\Modules\Product\Shared\Events\LowStockDetected;
use App\Modules\Product\Shared\Exceptions\InactiveProductException;
use App\Modules\Product\Shared\Exceptions\notInStockProductException;
use App\Modules\Product\Shared\Exceptions\ProductNotFoundException;
use App\Modules\Product\Shared\Models\Product;
use App\Modules\Product\Shared\Repositories\ProductRepository;

class ProductService implements ProductServiceInterface
{
    public function __construct(
       private ProductRepository $productRepository
    )
    {}

    public function decrementStock(int $productId, int $quantity):void
    {
        $product = $this->productRepository->findById($productId);
        if(!$product){
            throw new ProductNotFoundException($productId);
        }
        
        if (!$product->is_active) {
            throw new InactiveProductException($productId); 
        } 
        
        $this->productRepository->decrementStock($product ,$quantity );
        

        if($product->IsLowStock())
            event(new LowStockDetected($product, $product->stock));

    } 

    public function getProductById(int $productId): ProductResultDto
    {
        $product = $this->productRepository->findById($productId);
        if(!$product){
            throw new ProductNotFoundException($productId);
        }

        return new ProductResultDto(
            $product->id,
            $product->name,
            $product->price
        );

    }

}