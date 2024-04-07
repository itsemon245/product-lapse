<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use App\Traits\HasSubscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory, HasSubscription;
    protected $guarded = [];

    protected $casts = [
        'name' => JsonCast::class
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

}
