<?php

namespace App\Models;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    use HasFactory, HasImages;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
