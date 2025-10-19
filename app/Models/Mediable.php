<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mediable extends Model
{
    protected $fillable = ['media_id', 'mediable_id', 'mediable_type', 'role'];

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }
}
