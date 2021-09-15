<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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

            'id'    => $this->id,
            'name'  => $this->name,
            'mobile'=> $this->mobile,
            'email' => $this->email,
            'city'  => $this->city,
            'address1' => $this->address1,
            'address2' => $this->address2,
            
        ];
    }
}
