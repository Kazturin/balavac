<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{

    protected $fillable = [
        'title_kk',
        'title_ru',
        'content_kk',
        'content_ru',
        'slug',
        'thumbnail', 
        'active', 
        'published_at', 
        'meta_title', 
        'meta_description'];

    // protected $casts = [
    //     'published_at' => 'datetime'
    // ];


    protected function casts(): array
    {
       return [
        'published_at' => 'datetime'
       ];
    }

    // public static function booted()
    // {
    //     static::creating(function (self $post) {
    //         if($post->published_at==null){
                
    //             $post->published_at = date('Y.m.d h:i:s', time());
    //         }
    //     });
    // }

//    public function user(): BelongsTo
//    {
//        return $this->belongsTo(User::class);
//    }

    public function shortBody($words = 30): string
    {
        return Str::words(strip_tags($this->{'content_'.app()->getLocale()}), $words);
    }

    public function getFormattedDate()
    {
        return $this->published_at->translatedFormat('d F Y H:i');
    }

    public function getThumbnail()
    {
        if($this->thumbnail==NULL){
            return '/img/not_photo.png';
        }

        return '/storage/' . $this->thumbnail;
    }

    public function humanReadTime(): Attribute
    {
        return new Attribute(
            get: function ($value, $attributes) {
                $words = Str::wordCount(strip_tags($this->{'content_'.app()->getLocale()}));
                $minutes = ceil($words / 200);

                return $minutes . ' ' . str('min')->plural($minutes) . ', '
                    . $words . ' ' . str('word')->plural($words);
            }
        );
    }
}
