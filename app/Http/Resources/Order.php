<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'email' => $this->email,
            'name' => $this->name,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'city' => $this->city,
            'country' => $this->country,
            'postalcode' => $this->postalcode,
            'name_on_card' => $this->name_on_card,
            'discount' => $this->discount, 
            'discount_code' => $this->discount_code,
            'subtotal' => $this->subtotal,
            'tax' => $this->tax, 
            'total' => $this->total,
            'shipped' => $this-shipped
        ];
    }
}
