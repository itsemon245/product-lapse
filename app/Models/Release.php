<?php

namespace App\Models;

use App\Models\User;
use App\Traits\CanSendNotifications;
use App\Traits\HasComments;
use App\Traits\HasCreator;
use App\Traits\HasOwner;
use App\Traits\HasProducts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory, HasProducts, HasCreator, HasOwner, HasComments, CanSendNotifications;
    protected $guarded = [  ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
