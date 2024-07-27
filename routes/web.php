<?php

use App\Http\Controllers\BotManController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// Route::post('language', function (Request $request) {
//     \Illuminate\Support\Facades\App::setLocale($request->locale);
//      session()->put('locale', $request->locale);
//     \cookie('locale',$request->locale,60);
//     return redirect('/');
// })->name('language');

Route::post('language', function (Request $request) {
  //  dd($request->locale);
    app()->setLocale($request->locale);
    Session::put('locale', $request->locale);
    //dd(Session::all());
    return redirect()->back();
})->name('language');

Route::group([
    'prefix' => '{locale?}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
], function () {
    Route::get('/', \App\Http\Controllers\SiteController::class);
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
    Route::get('/post/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.view');
    Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');
    Route::get('/news/{news:slug}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.view');
    Route::get('/page/{page:slug}', \App\Http\Controllers\PageController::class)->name('page');
    Route::get('/search', SearchController::class)->name('search');
});
Route::get('/testing', \App\Http\Controllers\TestingController::class)->name('testing');

Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);
