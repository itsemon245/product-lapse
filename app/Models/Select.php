<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use App\Models\Scopes\OwnerScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Select extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected $casts = [
        'value'=> JsonCast::class
    ];

        /**
     * Scope a query to only include popular users.
     */
    public function scopeOf(Builder $query, string $model_type)
    {
        $query->where('model_type', $model_type);
    }
        /**
     * Scope a query to only include popular users.
     */
    public function scopeType(Builder $query, string $type)
    {
        $query->where('type', $type);
    }

        /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new OwnerScope);
    }
}
