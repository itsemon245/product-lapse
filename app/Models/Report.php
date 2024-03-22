<?php

namespace App\Models;

use App\Models\User;
use App\Traits\CanSendNotifications;
use App\Traits\HasComments;
use App\Traits\HasCreator;
use App\Traits\HasFile;
use App\Traits\HasOwner;
use App\Traits\HasProducts;
use App\Traits\HasSelects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory, HasFile, HasProducts, HasSelects, HasComments, HasCreator, HasOwner, CanSendNotifications;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
