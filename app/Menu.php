<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
/*     use HasFactory; */

    protected $fillable =[
        'name',
        'parent_id',
        'description',
        'content',
        'slug',
        'active'
    ];
    
    public function product()
    {
        return $this->hasMany(Product::class, 'menu_id', 'id'); // một menu có nhiều spham
    }

}
