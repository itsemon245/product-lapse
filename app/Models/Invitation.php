<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use App\Models\Scopes\OwnerScope;
use App\Traits\HasCreator;
use App\Traits\HasOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory, HasOwner, HasCreator;
    protected $guarded = [];
    protected $casts = [
        'tasks' => JsonCast::class
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invitation_products')->withoutGlobalScope(OwnerScope::class);
    }
}
