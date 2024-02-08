<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];


    protected $casts = [
        'name' => JsonCast::class,
        'product_limit' => JsonCast::class,
        'features' => JsonCast::class,
        'validity' => JsonCast::class,
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
