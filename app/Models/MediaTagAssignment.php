<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaTagAssignment extends Model
{
    protected $fillable = ['media_id', 'media_tag_id'];
}
