<?php

namespace App\Models;

use App\Models\User;
use App\Traits\HasCreator;
use App\Traits\HasProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Change extends Model
{
    use HasFactory, HasProducts, HasCreator;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
