<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    protected $menu;
    protected $product;
    public function __construct(MenuService $menu, ProductService $product)
    {
        $this->product = $product;
        $this->menu = $menu;
    }

    public function index( Menu $menu)
    {
        $menus = $this->menu->getAll();
        return view('shop', [
            'title' => 'Shop',
            'menus' => $menus,
            'products' => $this->product->showShop($menu, $menus),
            'category' => $menu
        ]);
    }
    public function show()
    {
        return view('shop', [
            'title' => 'Shop All',
            'menus' => $this->menu->getAll(),
            'products' => $this->product->showPage(12),
            'category' => null
        ]);
    }
}
