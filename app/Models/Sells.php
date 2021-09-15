<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sells extends Model
{
    protected $table = "sells";
    protected $fillable = ['client','pay_date','cash_status','in_pocket','barcode','product_number','description','price','tax','quantity','total'];
}
