<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Fee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'amount'=> $this->amount,
            'year'=> $this->year,
            'payment_type'=> $this->payment_type,
            'description'=> $this->description,
        ];
    }
}
