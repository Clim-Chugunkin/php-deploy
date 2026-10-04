<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Watch extends Model
{
    protected $fillable = ['brand', 'model', 'price', 'specs'];
    protected $appends = ['image_url'];
    //

    // Надежный метод кастинга, который точно перехватит массив в сидере
    protected function casts(): array
    {
        return [
            'specs' => 'array', // Принудительно упаковываем specs в JSON
        ];
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Storage::url() сам превратит его в http://127.0.0
            return Storage::url($this->image);
        }

        // Если картинки в базе нет, отдаем заглушку из папки public/images/
        return asset('images/no-photo.png');
    }
}
