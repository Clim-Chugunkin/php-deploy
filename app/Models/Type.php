<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Type extends Model
{
    //
    protected $fillable = ['type', 'image'];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Storage::url() сам превратит его в http://127.0.0
            return Storage::url($this->image);
        }

        // Если картинки в базе нет, отдаем заглушку из папки public/images/
        return asset('images/no-photo.jpeg');
    }
}
