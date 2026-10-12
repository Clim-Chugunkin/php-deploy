<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Watch;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'watch_id','product_id', 'quantity'];
    //
    public function watch(){
        return $this->belongsTo(Watch::class);
    }
    // Ваша обратная связь к модели Cart
    public function cart(): BelongsTo
    {
        // Laravel автоматически свяжет по полю cart_id
        return $this->belongsTo(Cart::class);
    }
}
