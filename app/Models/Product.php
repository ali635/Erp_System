<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'Product_name',
        'Product_number',
        'description',
        'position',
        'weight',
        'cost',
        'price',
        'quantity',
        'less_quantity',
        'Factory_No',
        'photo',
        'store_id'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }
}
