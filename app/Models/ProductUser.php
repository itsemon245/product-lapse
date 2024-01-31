<?php

namespace App\Models;

use App\Traits\HasProducts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
    use HasFactory, HasProducts;
    protected $guarded = [];
}
