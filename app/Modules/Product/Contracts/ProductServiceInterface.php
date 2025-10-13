<?php 

namespace App\Modules\Product\Contracts;

use App\Modules\Product\Shared\DTOs\ProductResultDto;

interface ProductServiceInterface{

    /** 
     * Decrement product stock. 
     */ 
    public function decrementStock(int $productId, int $quantity): void; 

    /** 
     * Get product by product id. 
     */ 
    public function getProductById(int $productId): ProductResultDto;

}

    


