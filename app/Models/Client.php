<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "clients";
    protected $fillable = ['name','mobile','email','city','address1','address2'];

}
