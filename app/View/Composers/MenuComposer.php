<?php

namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class MenuComposer
{

    protected $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function compose(View $view)
    {
        $menus = $this->menu->where('parent_id', 0)->where('status', 1)->with('children')->orderBy('order', 'ASC')->get();        
        $view->with('menus', $menus);
    }
}
