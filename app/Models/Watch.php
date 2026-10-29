<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Type;

class Watch extends Model
{
    protected $fillable = ['brand', 'type_id','model', 'image','price', 'specs'];
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
        return asset('images/no-photo.jpeg');
    }

    public function type(): BelongsTo{
        return $this->belongsTo(Type::class, 'type_id');
    }
}
