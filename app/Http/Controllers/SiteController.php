<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\QuestionAnswer;
use App\Models\TextWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteController extends Controller
{
    public function __invoke()
    {
       // dd('test');
       // $questionAnswer = QuestionAnswer::orderBy("sort")->limit(10)->get();

        $questionAnswer = Cache::remember('questionAnswer', 10, function () {
            return QuestionAnswer::query()->where('language',app()->getLocale())->orderBy("sort")->limit(10)->get();
        });

        $image = Cache::remember('image', 10, function () {
            return Image::query()->where('category_id',Image::CATEGORY_BANNER)->orderBy("created_at","desc")->first();
        });

        $posts = Cache::remember('lastPosts', 10, function () {
            return Post::query()->limit(3)->orderBy("published_at","desc")->get();
        });   

        $about_vaccination = Cache::remember('about_vaccination', 120, function () {
            return TextWidget::query()->where('key','about-vaccination')->first();
        }); 

        return view('site.index',compact('questionAnswer','posts','image','about_vaccination'));
    }
}
