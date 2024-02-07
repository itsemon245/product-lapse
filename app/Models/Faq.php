<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $guarded = [];

    protected $casts = [
        'question' => JsonCast::class,
        'answer' => JsonCast::class,
    ];
}
