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
        //return parent::toArray($request);

        return [
            'id'=> $this->id,
            'Product_name'=> $this->Product_name,
            'Product_number'=> $this->Product_number,
            'description'=> $this->description,
            'position'=> $this->position,
            'weight'=> $this->weight,
            'cost'=> $this->cost,
            'price'=> $this->price,
            'quantity'=> $this->quantity,
            'less_quantity'=> $this->less_quantity,
            'Factory_No'=> $this->Factory_No,
            //'photo'=> asset('/storage/app/public/' .$this->photo),
            'photo'=> asset('/storage/' .$this->photo),
            'store_id'=> $this->store_id,
        ];
    }
}
