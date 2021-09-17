<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Purchases extends JsonResource
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
        return[
            'id'       => $this->id,
            'supplier' => $this->supplier,
            'pay_date' => $this->pay_date,
            'cash_status'  => $this->cash_status,
            'in_pocket'    => $this->in_pocket,
            'barcode'      => $this->barcode,
            'product_number' => $this->product_number,
            'description'    => $this->description,
            'price'    => $this->price,
            'quantity' => $this->quantity,
            'total'    => $this->total,

        ];

    }
}
