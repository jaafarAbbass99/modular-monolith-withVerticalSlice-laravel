<?php

namespace App\Modules\Product\Features\CreateProduct\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Product\Features\CreateProduct\Requests\StoreProductRequest;
use App\Modules\Product\Features\CreateProduct\Resources\ProductResource;
use App\Modules\Product\Features\CreateProduct\Services\CreateProductService;

class CreateProductController extends Controller
{

    public function __construct(
        private CreateProductService $service
    ){}

    public function __invoke(StoreProductRequest $request)
    {
        try
        {
            $product = $this->service->execute($request->validated());
    
            return response()->json([
                'message' => 'Product created successfully',
                'data' => new ProductResource($product)
            ], 201);
        } 
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create product',
                'error' => $e->getMessage()
            ], 422);
        }
        
    }
}