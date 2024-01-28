<?php

namespace App\Models;

use App\Traits\HasProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory, HasProducts;
    protected $guarded = [  ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
