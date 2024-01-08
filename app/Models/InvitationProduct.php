<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
