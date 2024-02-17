<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OwnerScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model)
    {
        if (auth()->user()?->type == 'member') {
            $ownerId = auth()->user()?->owner_id;
        }else{
            $ownerId = auth()->user()?->id;   
        }
        // Only in development and local server
        if (config('app.env') == 'local' && config('app.debug') == true) {
            $ownerId = demoSub()->id;
        }
        return $builder->where('owner_id', $ownerId);
    }
}
