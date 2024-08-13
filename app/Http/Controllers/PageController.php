<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(string $locale=null,Page $page)
    {

       $menus = Menu::query()->with('page')->where('parent_id',$page->menu->parent_id)->get(); 

        return view("page.index", ["page" => $page, 'menus'=>$menus]);
    }
}
