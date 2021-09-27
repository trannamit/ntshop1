<?php
namespace App\Http\Services\Product;

use App\Menu;
use Exception;
use App\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active',1)->get();
    }
    
    public function getAll()
    {
        return Product::
        with('menu') // gọi tới function menu trong file Moder "Product.php"
        ->orderbyDesc('id')->paginate(20); // sắp xép tăng dần theo (id) và phân trang (20) item
    }
    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice === false) {
            return false;
        }
        try {
            $request->except('_tokent');
            Product::create($request->all());
            Session::flash('success','Thêm sản phẩm thành công');
        }catch(Exception $err){
            Session::flash('error', 'Thêm sản phẩm thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
        
    }

    public function isValidPrice($request)
    {
        if ((int)$request->input('price') != 0 && (int)$request->input('price')<=(int)$request->input('price_sale'))
        {
            Session::flash('error', 'Giá khuyến mãi phải nhỏ hơn giá gốc');
            return false;
        }

        if ((int)$request->input('price') < 0 && (int)$request->input('price_sale') <= 0)
        {
            Session::flash('error', 'Giá không được nhỏ hơn 0');
            return false;
        }
        return true;
    }
    
    public function destroy($request): bool
    {
        $id = (int) $request->input('id');
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            return Product::where('id', $id)->delete();
        }
        return false;
    }
    public function update($request, $product)
    {
        $product->fill($request->input());
        $product->save();
        Session::flash('success','Cập nhật sản phẩm thành công');
        return true;
    }

}