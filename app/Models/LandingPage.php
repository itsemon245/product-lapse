<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $casts = [
        'home' => JsonCast::class,
        'about_us' => JsonCast::class,
        'join' => JsonCast::class,
        'package' => JsonCast::class,
    ];
    protected $guarded = [];
}
