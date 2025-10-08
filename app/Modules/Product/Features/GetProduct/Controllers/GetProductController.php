<?php

namespace App\Modules\Product\Features\GetProduct\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Product\Features\CreateProduct\Resources\ProductResource;
use App\Modules\Product\Shared\Repositories\ProductRepository;

class GetProductController extends Controller
{
    public function __construct(
        private ProductRepository $product_repository
    )
    {}

    public function __invoke(int $id)
    {
        $product = $this->product_repository->findById($id);

        if(!$product){
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'data' => new ProductResource($product)
        ]);

    }
}