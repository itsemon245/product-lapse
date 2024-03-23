<?php

namespace App\Models;

use App\Traits\CanSendNotifications;
use App\Traits\HasFile;
use App\Traits\HasOwner;
use App\Traits\HasCreator;
use App\Traits\HasComments;
use App\Traits\HasProducts;
use App\Traits\HasSelects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory, HasFile, HasProducts, HasSelects ,HasComments, HasCreator, HasOwner, CanSendNotifications;
    protected $guarded = [];
}
