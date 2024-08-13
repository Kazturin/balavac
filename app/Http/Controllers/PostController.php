<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(string $locale=null)
    {
        $posts = Post::orderBy("created_at","desc")->paginate(5);

        return view("post.index", compact("posts"));
    }

    public function show(string $locale=null,Post $post)
    {
        return view("post.show", compact("post"));
    }
}
