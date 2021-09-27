<?php

namespace App\Http\View\Composers;

use App\Menu;
use Illuminate\View\View;
use App\Repositories\UserRepository;

class MenuComposer
{
    public function compose(View $view)
    {
        $menus = Menu::select('id','name','parent_id')->where('active',1)->orderByDesc('id')->get();
    
        $view->with('menus', $menus);
    }
}