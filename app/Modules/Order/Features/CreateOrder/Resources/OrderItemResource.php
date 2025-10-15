<?php

namespace  App\Modules\Order\Features\CreateOrder\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_id'=>$this->product_id,
            'quantity'=>$this->quantity,
            'unit_price'=> (float) $this->unit_price,
            'subtotal' => (float) $this->subtotal,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}        