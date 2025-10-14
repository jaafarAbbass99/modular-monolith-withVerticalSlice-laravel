<?php

namespace App\Modules\Order\Features\CreateOrder\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name'=> 'required|string|max:255',
            'customer_email'=> 'required|email', 
            'customer_phone'=> 'required|string|mx:20',
            'items'=>'required|array|min:1',
            'items.*.product_id'=>'required',
            'items.*.quantity'=>'required|integer|min:1',
        ];
    }
}