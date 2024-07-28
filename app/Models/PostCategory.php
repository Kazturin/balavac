<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PostCategory extends Model
{

    public $timestamps = false;

    protected $fillable = ['title_kk', 'title_ru', 'slug','parent_id','sort','vaccination_route'];


    public function post(): HasOne
    {
        return $this->hasOne(Post::class,'category_id','id');
    }

    public function children()
    {
        return $this->hasMany(PostCategory::class, 'parent_id', 'id');
    }

    // public function publishedPosts(): BelongsToMany
    // {
    //     return $this->belongsToMany(Post::class)
    //         ->where('active', '=', 1)
    //         ->whereDate('published_at', '<', Carbon::now());
    // }
}
