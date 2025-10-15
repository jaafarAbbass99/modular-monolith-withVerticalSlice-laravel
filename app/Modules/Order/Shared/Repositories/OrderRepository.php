<?php

namespace App\Modules\Order\Shared\Repositories;

use App\Modules\Order\Shared\DTOs\OrderDTO;
use App\Modules\Order\Shared\DTOs\OrderItemDTO;
use App\Modules\Order\Shared\Models\Order;
use App\Modules\Order\Shared\Models\OrderItem;
use GuzzleHttp\Promise\Create;

class OrderRepository
{

    public function create(OrderDTO $orderDTO):Order
    { 
      return Order::create([
        'customer_name'=>$orderDTO->customerName,
        'customer_email'=>$orderDTO->customerEmail, 
        'customer_phone'=>$orderDTO->customerPhone,
        'total_amount'=> $orderDTO->totalAmount
      ]);  
    }

    public function addItem(Order $order,OrderItemDTO $itemDto ):OrderItem
    {
      return OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $itemDto->productId ,
        'quantity'=> $itemDto->quantity,
        'unit_price'=> $itemDto->unitPrice
      ]);
    }

    public function updateTotalAmount(Order $order, float $totalAmount): void
    {
        $order->update(['total_amount' => $totalAmount]);
    }

}
