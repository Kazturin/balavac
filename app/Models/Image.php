<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    const CATEGORY_BANNER = 1;
    const CATEGORY_INFO = 2;

    protected $fillable = ["thumbnail","wallaper","category_id"];

    public function getThumbnail()
    {
        if($this->thumbnail==NULL){
            return '/img/not_photo.png';
        }

        return '/storage/' . $this->thumbnail;
    }
}
