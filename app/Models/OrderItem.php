<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Watch;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    //
    protected $guarded = [];

    public function watch() : BelongsTo{
        return $this->belongsTo(Watch::class);
    }
}
