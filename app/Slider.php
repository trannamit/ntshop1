<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable =[
        'name',
        'url',
        'thumb',
        'sort_by',
        'active'
    ];
}
