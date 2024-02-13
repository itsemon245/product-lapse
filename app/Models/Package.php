<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];


    protected $casts = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
