<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'bank_details' => JsonCast::class,
        'card_details' => JsonCast::class,
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function plan(): HasOne
    {
        return $this->hasOne(Plan::class, 'order_id', 'id')->latest();
    }
}
