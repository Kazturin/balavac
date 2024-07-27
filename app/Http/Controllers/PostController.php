<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(string $locale=null)
    {
        $posts = Post::orderBy("created_at","desc")->with('category')->paginate(5);
        $categories = PostCategory::with(['children','post'])->where('parent_id', NULL)->orderBy("sort")->get();

        return view("post.index", compact("posts","categories"));
    }

    public function show(string $locale=null,Post $post)
    {
        $categories = PostCategory::with(['children' => function ($query) {
            $query->with('post');
        }])->with('post')->where('parent_id', NULL)->orderBy("sort")->get();

        $postCategory = $post->category;
        // dd($post->category);
      // dd($categories[0]->children->contains($post->category));
        return view("post.show", compact("post","categories","postCategory"));
    }
}
