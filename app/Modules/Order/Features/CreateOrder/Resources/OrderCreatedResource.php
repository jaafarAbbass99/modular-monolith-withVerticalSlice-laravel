<?php

namespace  App\Modules\Order\Features\CreateOrder\Resources;

use App\Modules\Order\Shared\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCreatedResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_name'=> $this->customer_name,
            'customer_email'=> $this->customer_email, 
            'customer_phone'=> $this->customer_phone,
            'total_amount'=> $this->total_amount,
            'status'=> $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'items'=>OrderItemResource::collection($this->whenLoaded('items')),
        ];
    }
}        