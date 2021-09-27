<?php

namespace App\Http\Services\Menu;

use App\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class MenuService
{
    public function show()
    {
        return Menu::select('name', 'id', 'description','slug')
        ->where('parent_id', 0)
        ->orderbyDesc('id')
        ->limit(4)
        ->get();
    }

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get(); // nếu parent_id = 0 lấy toàn bộ
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20); // sắp xép tăng dần theo (id) và phân trang (20) item
    }

    public function create($request) // đưa dữ liệu vào Database
    {
        try {
            Menu::create([          // phương thức Eloquent ORM
                'name' => (string)$request->input('name'),
                'parent_id' => (int)$request->input('parent_id'),
                'description' => (string)$request->input('description'),
                'content' => (string)$request->input('content'),
                'slug' => (string)$request->input('slug'),
                'active' => (string)$request->input('active')
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Tạo danh mục không thành công');
            return false;
        }
        return true;
    }

    public function destroy($request): bool
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $request->input('id'))->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function update($request, $menu)
    {
        /* $menu->fill($request->input());
        $menu->save(); */
        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int)$request->input('parent_id');
        }
        $menu->name = (string)$request->input('name');
        $menu->description = (string)$request->input('description');
        $menu->content = (string)$request->input('content');
        $menu->slug = (string)$request->input('slug');
        $menu->active = (string)$request->input('active');
        $menu->save();

        Session::flash('success', 'Cập nhật thành công!');
        return true;
    }
}
