<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'language',
        'title_kk',
        'content_kk',
        'title_ru',
        'content_ru',
        'slug',
        'thumbnail',
        'menu_id',
        'parent_id',
        'meta_title',
        'meta_description',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function parent(){
        return $this->hasOne(Page::class,'id','parent_id');
    }

    public function menu(){
        return $this->hasOne(Menu::class,'id','menu_id');
    }

    public function getThumbnail()
    {
        if($this->thumbnail==NULL){
            return '/img/not_photo.png';
        }

        return '/storage/' . $this->thumbnail;
    }
}
