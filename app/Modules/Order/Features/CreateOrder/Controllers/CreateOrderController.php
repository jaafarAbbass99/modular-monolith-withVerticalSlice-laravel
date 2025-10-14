<?php

namespace App\Modules\Order\Features\CreateOrder\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Order\Features\CreateOrder\Requests\CreateOrderRequest;
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

        }
        catch(Exception $e){

        }
    }
}