<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(string $locale=null){

        $news = News::orderBy("published_at","desc")->paginate(10);

        return view("news.index",compact("news"));
    }

    public function show(string $locale=null,News $news){

        return view("news.show",compact("news"));
    }
}
