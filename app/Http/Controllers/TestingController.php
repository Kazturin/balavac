<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestingController extends Controller
{
    public function __invoke(string $locale=null)
    {
        $aboutTest = DB::table('text_widgets')->where('key','about-test')->first();
        return view('testing.index',compact('aboutTest'));
    }
}
