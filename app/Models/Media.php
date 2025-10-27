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

    /**
     * Relation: One media can be used by multiple resources
     */
    public function resources()
    {
        return $this->hasMany(MediaResources::class, 'media_id');
    }
}
