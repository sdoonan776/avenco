<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'category_id' => $this->category_id,
            'name' => $this->name, 
            'slug' => $this->slug,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'product_image' => $this->product_image
        ];
    }
}
