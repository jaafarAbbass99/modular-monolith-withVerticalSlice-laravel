<?php

namespace App\Modules\Product\Shared\Repositories;

use App\Modules\Product\Shared\Models\Product;
use App\Modules\Product\Shared\DTOs\ProductDTO;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function create(ProductDTO $productDTO): Product
    {
        return Product::create([
            'name' => $productDTO->name,
            'description' => $productDTO->description,
            'price' => $productDTO->price,
            'stock' => $productDTO->stock,
            'category' => $productDTO->category
        ]);
    }

    public function findById(int $id): ?Product
    {
        return Product::find($id);
    }

    public function getAllActive()
    {
        return Product::active()->get();
    }

    public function updateStock(int $productId, int $newStock): bool
    {
        return Product::where('id', $productId)->update(['stock' => $newStock]);
    }


    public function getFilteredProducts(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = Product::active();

        // Filter by category
        if (!empty($filters['category'])) {
            $query->byCategory($filters['category']);
        }

        // Filter by price range
        if (!empty($filters['min_price']) && !empty($filters['max_price'])) {
            $query->priceRange($filters['min_price'], $filters['max_price']);
        }

        // Filter by stock availability
        if (isset($filters['in_stock']) && $filters['in_stock']) {
            $query->inStock();
        }

        return $query->paginate($perPage);
    }

    public function getProductsByCategory(string $category, int $perPage = 15): LengthAwarePaginator
    {
        return Product::active()
            ->byCategory($category)
            ->paginate($perPage);
    }


}