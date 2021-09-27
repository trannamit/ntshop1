<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $product;
    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function index(Product $product)
    {
        return view('product.product',[
            'title' => 'Sản Phẩm ' . $product->name ,
            'product' => $product,
            'products' => $this->product->showAll()
        ]);
    }

}
