<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $table = "purchases";
    protected $fillable = ['supplier','pay_date','cash_status','in_pocket','barcode','product_number','description','price','quantity','total'];

}
