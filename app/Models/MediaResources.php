<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class MediaResources extends Model
{
    use HasFactory;

    protected $table = 'media_resources';

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'slug',
        'title',
        'type',
        'media_id',
        'path',
        'alt_text',
        'caption',
        'mime_type',
        'category',
    ];

    /**
     * Relation: MediaResources belongs to Media
     */
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    /**
     * Helper: Fetch all media resources with their attached media
     */
    public static function pathMedia(string $path)
    {
        $query = self::with('media'); // eager load relation

        return $query->where('path', $path)->get();
    }
}