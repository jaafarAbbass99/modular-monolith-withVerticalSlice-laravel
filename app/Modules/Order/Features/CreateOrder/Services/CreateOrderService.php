<?php

namespace App\Modules\Order\Features\CreateOrder\Services;

use App\Modules\Order\Contracts\ProductStockServiceInterface;
use App\Modules\Order\Shared\DTOs\OrderDTO;
use App\Modules\Order\Shared\DTOs\OrderItemDTO;
use App\Modules\Order\Shared\Models\Order;
use App\Modules\Order\Shared\Repositories\OrderRepository;
use App\Modules\Product\Contracts\ProductServiceInterface;
use Illuminate\Support\Facades\DB;

class CreateOrderService
{
    public function __construct(
        private OrderRepository $orderRepository,
        private ProductServiceInterface $productStockService
    )
    {}

    public function execute(array $data): Order
    {
        $orderDTO = new OrderDTO(
            customerName: $data['customer_name'],
            customerEmail: $data['customer_email'],
            customerPhone: $data['customer_phone'],
            totalAmount: 0
        );
        
        
        return DB::transaction(function () use ($data,$orderDTO) {
            // انشاء طلب
            $order = $this->orderRepository->create($orderDTO);

            $totalAmount = $this->addOrderItems($order , $data['items']);
            
            $this->orderRepository->updateTotalAmount($order , $totalAmount);

            return $order->load('items');

        });
        
    }

    // اضافة العناصر الى الطلب 
            // التحقق وحجز المخزون  
            // انشاء سجل في orderItem 
            // حساب مبلغ الكمية 
            // ارجاع مبلغ جميع العناصر اي مبلغ الفاتورة 

    private function addOrderItems(Order $order , array $items):float
    {
        $totalAmount = 0 ;

        foreach($items as $item){

            $this->productStockService->decrementStock(
                $item['product_id'],
                $item['quantity']
            );

            $productInfo = $this->productStockService->getProductById($item['product_id']);
            
            $orderItem = $this->orderRepository->addItem(
                $order ,
                new OrderItemDTO
                    (
                        $productInfo->id,
                        $item['quantity'] ,
                        $productInfo->price,
                    )
                );
            $totalAmount += $orderItem->subtotal; 
        }
        return $totalAmount;
    }

}