<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable=['user_id','amount','year','payment_type','description'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
