<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    public function __construct(ProductService $product,MenuService $menu, SliderService $slider)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }
    public function index()
    {
        return view('home', [
            'title' => 'NTech Shop PC-Laptop-Smarthome-Phụ kiện',
            'sliders' => $this->slider->show(),
            'categorys' => $this->menu->show(),
            'products' => $this->product->show()
        ]);
    }
}
