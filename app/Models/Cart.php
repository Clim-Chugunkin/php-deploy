<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CartItem;
use App\Models\Watch;

class Cart extends Model
{
    protected $fillable = ['user_id','session_id'];
    //
    public function items(){
        return $this->hasMany(CartItem::class);
    }

    public function getTotalPrice(){
        return $this->items->sum(function ($item){
            return $item->watch?->price ?? 0;
        });
    }
}
