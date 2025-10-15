<?php

namespace App\Modules\Order\Features\CreateOrder\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Order\Features\CreateOrder\Requests\CreateOrderRequest;
use App\Modules\Order\Features\CreateOrder\Resources\OrderCreatedResource;
use App\Modules\Order\Features\CreateOrder\Services\CreateOrderService;
use Exception;

class CreateOrderController extends Controller
{
    public function __construct(
        private CreateOrderService $createOrderService
    )
    {}

    public function __invoke(CreateOrderRequest $request)
    {
        try{
            $order = $this->createOrderService->execute($request->validated());

            return response()->json([
                'message' => 'Order created successfully',
                'data' => new OrderCreatedResource($order)
            ], 201);
        }
        catch(Exception $e){
            return response()->json([
                'message' => 'Failed to create order',
                'error' => $e->getMessage()
            ], 422);
        }
    }
}