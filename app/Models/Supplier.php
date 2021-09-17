<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
    protected $fillable = ['name','mobile','email','city','address1','address2'];
}
