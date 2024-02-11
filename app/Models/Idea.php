<?php

namespace App\Models;

use App\Traits\HasCreator;
use App\Traits\HasComments;
use App\Traits\HasOwner;
use App\Traits\HasProducts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, HasProducts, HasComments, HasCreator, HasOwner;
    protected $guarded = [];
}
