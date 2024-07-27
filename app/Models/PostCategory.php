<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PostCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title_kk', 'title_ru', 'slug','parent_id','sort'];


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
