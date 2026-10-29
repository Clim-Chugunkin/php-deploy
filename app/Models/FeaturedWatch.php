<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Watch;

class FeaturedWatch extends Model
{
    protected $fillable = ['watch_id'];
    //

    public function watch(): BelongsTo{
        return $this->belongsTo(Watch::class);
    }
}
