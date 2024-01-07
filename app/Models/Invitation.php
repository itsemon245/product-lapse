<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invitation_products', 'invitation_id', 'product_id');
    }
}
