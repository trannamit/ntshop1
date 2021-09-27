<?php

namespace App\Http\Services;

use App\Carts;
use App\Product;
use App\Customer;
use App\Jobs\SendMail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số  lượng hoặc sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [$product_id => $qty]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;


            Session::put('carts', $carts);
            return true;
        }
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        return true;
        #dd($carts);
    }


    public function getProducts()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) {
            return [];
        }
        $productId = array_keys($carts);
        return Product::where('active', 1 )->whereIn('id' , $productId)->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;

    }

    public function addCart($request)
    {
        try {
DB::beginTransaction();

            $carts = Session::get('carts');
            if(is_null($carts)) return false;

            $customer = Customer::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'add' => $request->input('add'),
            'email' => $request->input('email'),
            'note' => $request->input('note'),

            ]);
            
            $this->infoProductCarts ($carts, $customer->id);

            DB::commit();
            Session::flash('success', 'Dật hàng thành công');
            Session::forget('carts');
            SendMail::dispatch($request->input('email'))->delay(now()->addSecond(2));



        } catch (\Exception $err){
            DB::rollback();
            Session::flash('error', 'Dật hàng lỗi');
            return false;

        }
        return true;
    }

    protected function infoProductCarts($carts, $customer_id)
    {
        $productId = array_keys($carts);
            $products = Product::where('active', 1)
            ->whereIn('id', $productId)
            ->get();

            $daa = [];
        foreach($products as $key => $product)
        {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'qty' => $carts[$product->id],
                'price' => $product->price_sale == null? $product->price: $product->price_sale,
            ];
        }

        return Carts::insert($data);
    }

    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

    public function getProductsForCart($customer)
    {
        return $customer->carts()->with(['product' => function($query){
            $query->select('id','name', 'thumb');
        }])->get();
    }
}
