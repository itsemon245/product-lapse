<?php

namespace App\Models;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasImages;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
