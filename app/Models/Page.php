<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasMedia;

class Page extends Model
{
    use HasMedia;

    protected $fillable = ['slug', 'title', 'content'];
}
