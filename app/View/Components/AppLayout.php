<?php

namespace App\View\Components;

use App\Models\Image;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\News;
use App\Models\Menu;
use App\Models\TextWidget;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AppLayout extends Component
{
    public $news;
    public $menu;

    public $footer;
    public $hotLine;

    public $infoImages;
    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null)
    {
      
        $this->news = Cache::remember('lastNews', 10, function () {
            return News::orderBy("published_at","desc")->limit(2)->get();
        });
        $this->menu = Cache::remember('menu', 10, function () {
            return Menu::query()->with(['children'=> function ($query) {
                $query->with('page');
            },'page'])->where('parent_id', NULL)->orderBy("sort")->get();
        });

       // dd($this->menu);

        $this->footer = Cache::remember('footer', 60, function () {
            return TextWidget::query()->where("key",'footer')->first();
        });

        $this->hotLine = Cache::remember('hotLine', 120, function () {
            return DB::table('text_widgets')->where('key','hotLine')->first();
        });

        $this->infoImages = Cache::remember('infoImages', 120, function () {
            return Image::query()->where('category_id', Image::CATEGORY_INFO)->get();
        });

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
      //  dd($this->menu);
        return view('layouts.app');
    }
}
