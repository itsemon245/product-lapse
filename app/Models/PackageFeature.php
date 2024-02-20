<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFeature extends Model
{
    use HasFactory;
    protected $guarded = [  ];

    protected $casts = [
        'name' => JsonCast::class,
     ];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'feature_package');
    }

    public function isActiveFor(int $packageId): bool
    {
        return $this->packages()->withPivot('is_on')->find($packageId)->getOriginal('pivot_is_on');
    }
}
