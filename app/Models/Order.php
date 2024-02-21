<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function subscriber()
    {
        return $this->belongsTo(User::class, 'subscriber_id');
    }
}
