<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Slider\SliderService;


class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }
    public function create()
    {
        return view('admin.sliders.add', [
            'title' => 'Thêm slider'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required'
        ]);
        $this->slider->insert($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.sliders.list', [
            'title' => 'Danh sách Sliders',
            'sliders' => $this->slider->get()
        ]);
    }
    public function destroy(Request $request)
    {
        $result = $this->slider->destroy($request);
        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Đã xoá'
            ]);
        }
        return response()->json([
            'error' => true,
        ]);

    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.edit',[
            'title' => 'Sửa slider : '. $slider->name,
            'slider' => $slider
        ]);
    }

    public function update(Slider $slider, Request $request)
    {
        $this->slider->update($request,$slider);
        return redirect('/admin/sliders/list');
    }
}
