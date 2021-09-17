<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Receipt extends JsonResource
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
            'user_id'=> $this->user_id,
            'amount'=> $this->amount,
            'year'=> $this->year,
            'payment_type'=> $this->payment_type,
            'description'=> $this->description,
        ];
    }
}
