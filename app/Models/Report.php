<?php

namespace App\Models;

use App\Models\User;
use App\Traits\HasImages;
use App\Traits\HasProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory, HasImages, HasProducts;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
