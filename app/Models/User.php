<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $fillable = ['name','mobile','email','city','address1','address2'];

    public function receipts()
    {
        return $this->hasMany('App\Models\Receipt');
    }

}
