<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address_1' => 'required|string|max:255',
            'address_2' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postalcode' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'name_on_card' => 'required|string|max:255',
            'discount' => 'required',
            'discount_code' => 'required',
            'subtotal' => 'required|numeric',
            'tax' => 'required|numeric',
            'total' => 'requied|numeric'
        ];
    }
}
