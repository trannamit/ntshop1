<?php

namespace App;

use App\Menu;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'name',
        'menu_id',
        'description',
        'content',
        'active',
        'price',
        'price_sale',
        'thumb'

    ];
    public function menu()
    {
        return $this->hasOne(Menu::class, 'id','menu_id') //liên kết khoá chính "id" từ bẳng Menu sang khoá phụ "menu_id" từ bảng Product
        ->withDefault(['name' => '']); // trong danh muc khi bi xoa danh muc
    }
}
