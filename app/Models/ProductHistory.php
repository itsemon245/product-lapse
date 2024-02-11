<?php

namespace App\Models;

use App\Traits\HasImages;
use App\Traits\HasOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    use HasFactory, HasImages, HasOwner;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
