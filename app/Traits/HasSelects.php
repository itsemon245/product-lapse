<?php
namespace App\Traits;

use App\Enums\SelectType;
use App\Models\Select;
use Illuminate\Support\Str;

trait HasSelects
{
    public function selects()
    {
        return $this->morphToMany(Select::class, 'selectable');
    }

    public function getSelect(string $type)
    {
        return $this->selects->where('type', $type)->first();
    }

    /**
     * The "booted" method of the model.
     */
    protected static function bootHasSelects(): void
    {
        static::created(function ($model) {
            $ids = self::getIdsFromRequest($model);
            $model->selects()->attach($ids);
        });
        static::updated(function ($model) {
            $ids = self::getIdsFromRequest($model);
            $model->selects()->sync($ids);
        });
        static::deleting(function ($model) {
            $model->selects()->detach();
        });
    }

    /**
     * Get the ids from requested field for the specified model
     *
     * @param mixed $model
     * @return array
     */
    public static function getIdsFromRequest($model)
    {
        $feature = explode("\\", get_class($model));
        $feature = Str::lower(array_pop($feature));
        $types   = array_column(SelectType::map($feature), 'value');
        $ids     = collect($types)->map(fn($t) => request()->{$t})->toArray();
        return $ids;
    }

}
