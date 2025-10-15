<?php 

namespace App\Modules\Product\Shared\Events;

use App\Modules\Product\Shared\Models\Product;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LowStockDetected 
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public readonly Product $product,
        public readonly int $remainingStock
    ) {}

}