<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(string $locale=null,Page $page)
    {
       // dd($page);
        return view("page.index", ["page"=> $page]);
    }
}
