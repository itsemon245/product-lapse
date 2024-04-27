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
            $ids     = self::getIdsFromRequest($model);
            $model->selects()->attach($ids);
        });
        static::updated(function ($model) {
            $request = request();
            $ids     = self::getIdsFromRequest($model);
            $types   = self::getTypes($model);
            foreach ($types as $type) {
                if ($request->input($type) != null) {
                    $id = $model->selects()->where('type', $type)->first()?->id;
                    if ($id) {
                        $model->selects()->toggle($id);
                    }
                }
            }
            foreach ($ids as $id) {
                if ($id != null) {
                    $model->selects()->attach($id);
                }
            }
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
    /**
     * Get the ids from requested field for the specified model
     *
     * @param mixed $model
     * @return array
     */
    public static function getTypes($model)
    {

        $feature = explode("\\", get_class($model));
        $feature = Str::lower(array_pop($feature));
        $types   = array_column(SelectType::map($feature), 'value');
        return $types;
    }

}
