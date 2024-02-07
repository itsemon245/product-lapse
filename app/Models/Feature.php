<?php

namespace App\Models;

use App\Casts\JsonCast;
use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded = [];

    protected $casts = [
        'title' => JsonCast::class,
        'caption' => JsonCast::class,
    ];
}
