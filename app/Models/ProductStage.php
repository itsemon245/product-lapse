<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStage extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_id',
        'name',
        'text_color',
    ];
}