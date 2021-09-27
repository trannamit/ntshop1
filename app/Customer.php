<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','phone','add','email','note'
    ];

    public function carts()
    {
        return $this->hasMany(Carts::class, 'customer_id', 'id' );
    }
}
