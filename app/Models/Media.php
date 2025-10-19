<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Media extends Model
{
    protected $fillable = [
        'uuid', 'original_name', 'filename', 'path', 'disk', 'mime_type', 'size',
        'width', 'height', 'variants', 'folder_id'
    ];

    protected $casts = [
        'variants' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(MediaFolder::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(MediaTag::class, 'taggable', 'media_tag_assignments');
    }

    public function mediables()
    {
        return $this->hasMany(Mediable::class);
    }

    public function attachedTo($modelType)
    {
        return $this->morphedByMany($modelType, 'mediable');
    }
}
