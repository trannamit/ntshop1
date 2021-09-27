<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    public $timestamp = false;
    protected $fillable = [
        'customer_id',
        'product_id',
        'qty',
        'price'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
