<?php

namespace App\Modules\Product\Features\ListProducts\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Product\Features\ListProducts\Requests\ListProductsRequest;
use App\Modules\Product\Features\ListProducts\Resources\ProductCollection;
use App\Modules\Product\Shared\Repositories\ProductRepository;

class ListProductsController extends Controller
{

    public function __construct(
        private ProductRepository $product_repository    
    ) 
    {} 

    public function __invoke(ListProductsRequest $request)
    {
        try{
            $filters = [
                'category' => $request->get('category'),
                'min_price' => $request->get('min_price'),
                'max_price' => $request->get('max_price'),
                'in_stock' => $request->get('in_stock'),
            ];
            $perPage = $request->get('per_page', 15);

            $products = $this->product_repository->getFilteredProducts($filters,$perPage);
            
            return response()->json([
                'message' => 'Products retrieved successfully',
                'data' => new ProductCollection($products)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve products',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}