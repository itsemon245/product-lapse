<?php

namespace App\Models;

use App\Models\User;
use App\Traits\CanSendNotifications;
use App\Traits\HasComments;
use App\Traits\HasCreator;
use App\Traits\HasOwner;
use App\Traits\HasProducts;
use App\Traits\HasSelects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Change extends Model
{
    use HasFactory, HasProducts, HasSelects, HasComments, HasCreator, HasOwner, CanSendNotifications;
    protected $guarded = [];
}
