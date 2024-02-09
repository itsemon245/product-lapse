<?php

namespace App\Models;

use App\Traits\HasComments;
use App\Traits\HasProducts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, HasProducts, HasComments;
    protected $guarded = [  ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
