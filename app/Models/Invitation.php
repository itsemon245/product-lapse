<?php

namespace App\Models;

use App\Traits\HasCreator;
use App\Traits\HasOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory, HasOwner, HasCreator;
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invitation_products', 'invitation_id', 'product_id');
    }
}
