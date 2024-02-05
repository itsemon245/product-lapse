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
        'about_us'=> JsonCast::class,
        'features'=> JsonCast::class,
        'contact_us'=> JsonCast::class,
    ];
    protected $guarded = [];
}
