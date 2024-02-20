<?php

namespace App\Models;

use App\Casts\Utils\JsonCast;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];


    protected $casts = [
        'name'=> JsonCast::class
    ];

    public function features()
    {
        return $this->belongsToMany(PackageFeature::class, 'feature_package');
    }
    public function activeFeatures(){
        return $this->features()->wherePivot('is_on', true);
    }

}
