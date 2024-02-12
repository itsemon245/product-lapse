<?php

namespace App\Models;

use App\Traits\HasFile;
use App\Traits\HasOwner;
use App\Traits\HasCreator;
use App\Traits\HasComments;
use App\Traits\HasProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory, HasFile, HasProducts, HasCreator, HasComments, HasOwner;
    protected $guarded = [];


}
