<?php

namespace App\Models;

use App\Traits\HasComments;
use App\Traits\HasCreator;
use App\Traits\HasFile;
use App\Traits\HasProducts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Task extends Model
{
    use HasFactory, HasFile, HasProducts, HasComments, HasCreator;
    protected $guarded = [];

    protected $casts = [
        'choose_mvp' => 'boolean',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
