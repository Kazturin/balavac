<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(string $locale=null,Request $request)
    {
        $query = $request->input('query');

    //    dd($query);

        $resultsPage = Page::where(function ($queryBuilder) use ($query) {
            $queryBuilder->whereRaw("MATCH(title_kk, title_ru, content_kk, content_ru) AGAINST(? IN BOOLEAN MODE)", [$query]);        
        })
        ->get();

        $resultsPost = Post::where(function ($queryBuilder) use ($query) {
            $queryBuilder->whereRaw("MATCH(title_kk, title_ru, content_kk, content_ru) AGAINST(? IN BOOLEAN MODE)", [$query]);        
        })
        ->get();

        $resultsNews = News::where(function ($queryBuilder) use ($query) {
            $queryBuilder->whereRaw("MATCH(title_kk, title_ru, content_kk, content_ru) AGAINST(? IN BOOLEAN MODE)", [$query]);        
        })
        ->get();

    //    dd($resultsPost);

        return view('search.index', compact(['resultsPage','resultsPost','resultsNews']));
    }
}
