<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Services\NewsService;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;

    }
    public function create()
    {
        return view('admin/news/add',[
            'title' => 'Add News'
        ]);
    }

    public function index()
    { 
        return view('admin/news/list',[
            'title' => 'List News',
            'newss' => $this->newsService->show()
        ]);
    }

    public function store(Request $request)
    {
        $this->newsService->insert($request);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->newsService->destroy($request);
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
    public function show (News $news)
    {
        return view('admin.news.edit',[
            'title' => 'Sửa Tin số : '. $news->id,
            'news' => $news
        ]);
    }

    public function update(News $news, Request $request)
    {
        $this->newsService->update($request,$news);
        return redirect('/admin/news/list');
    }
}
