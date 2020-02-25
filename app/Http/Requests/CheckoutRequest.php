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
            'billing_name' => 'required|string|max:255',
            'billing_email' => 'required|email|max:255',
            'billing_address' => 'required|string|max:255',
            'billing_city' => 'required|string|max:255',
            'billing_country' => 'required|string|max:255',
            'billing_postalcode' => 'required|string|max:255',
            'billing_phone' => 'required|string|max:255',
            'billing_name_on_card' => 'required|string|max:255',
            'cvv' => 'required',
            'billing_expiry_date' => 'required',
            'billing_card_number' => 'required',
        ];
    }
}
