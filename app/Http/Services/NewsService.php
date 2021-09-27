<?php
namespace App\Http\Services;

use App\News;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class NewsService
{
    public function insert($request)
    {
        try {
            $request->except('_tokent');
            News::create($request->all());

            Session::flash('success', 'Thêm tin thành công');
        } catch (\Exception $e){

            Session::flash('error', 'Thêm tin thất bại');
            Log::info($e->getMessage());
        }
    }
    public function show(){
        return News::select('id','title','active','created_at','updated_at','thumb')->orderByDesc('id')->paginate(15);
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $news = News::where('id', $id)->first();
        if($news)
        {
            return News::where('id', $id)->delete();
        }

    }
    public function update($request, $news)
    {
        $news->fill($request->input());
        $news->save();
        Session::flash('success','Cập nhật tin thành công');
        return true;
    }
    public function showPage()
    {
        return News::where('active',1)->orderbyDesc('id')->paginate(3);
    }
}