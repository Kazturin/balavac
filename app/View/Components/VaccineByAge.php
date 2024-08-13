<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\PostCategory;

class VaccineByAge extends Component
{
    public $vaccineByAge;
    public $colors;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->vaccineByAge = Menu::query()->where('vaccination_route',true)->with('page')->orderBy('sort')->get();
        $this->colors = ['bg-amber-500','bg-pink-500','bg-green-500','bg-yellow-500','bg-lime-500','bg-cyan-500','bg-indigo-500','bg-fuchsia-500','bg-teal-500'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
     //   dd($this->vaccineByAge);
        return view('components.vaccine-by-age');
    }
}
