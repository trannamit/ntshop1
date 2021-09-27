<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Query;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('admin.carts.customer',[
            'title' => 'Danh sách đơn hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductsForCart($customer);
        return view('admin.carts.detail', [
            'title' => 'Chi tiết đơn hàng của: '.$customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
