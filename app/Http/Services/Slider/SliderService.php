<?php

namespace App\Http\Services\Slider;

use App\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SliderService
{
    public function show()
    {
        return Slider::where('active',1)->orderbyDesc('sort_by')->get();
    }
    public function insert($request)
    {
        $request->except('_token');
        try {
            Slider::create($request->input());
            Session::flash('success', 'Thêm slider thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm slider lỗi');
            Log::info($err->getMessage());
            return false;
        }
    }
    public function get()
    {
        return Slider::orderbyDesc('id')->paginate(20);
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $slider = Slider::where('id', $id)->first();
        if($slider)
        {
            return Slider::where('id', $id)->delete();
        }

    }
    public function update($request, $slider)
    {
        $slider->fill($request->input());
        $slider->save();
        Session::flash('success','Cập nhật slider thành công');
        return true;
    }
}
