<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'name'=> JsonCast::class
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
