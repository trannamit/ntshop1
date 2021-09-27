<?php

namespace App\Http\Services\Product;

use App\Product;

class ProductService
{
    const LIMIT = 16;
    public function show()
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->orderByDesc('id')
            ->limit(self::LIMIT)
            ->get();
    }

    public function showAll()
    {
        return Product::orderByDesc('id')->get();
    }

    public function showPage($index)
    {
        return Product::orderByDesc('id')->paginate($index);
    }

    public function showShop($menu, $menus)
    {
        $list = array();
        foreach ($menus as $men) {
            if ($men->parent_id == $menu->id) {
                $list[] = $men->id;
            }
        }
        $list == null ? $list = [$menu->id] : '';
        #dd($list);
        return Product::whereIn('menu_id', $list)->orderByDesc('id')->paginate(15);
    }
}
