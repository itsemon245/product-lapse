<?php
namespace App\Services;

use App\Models\Task;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\SearchRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SearchService
{

    public function __construct(protected SearchRequest $request)
    {
    }
    /**
     * Return a builder instance for the given params
     *
     * @param SearchRequest|null $request
     * @return Builder
     */
    public static function items(SearchRequest $request = null, int $limit = 10)
    {
        if ($request == null) {
            $request = self::$request;
        }
        $model   = "App\\Models\\". Str::studly($request->model);
        $columns = $request->columns;
        $search  = $request->search;
        return $model::whereHas('products', function(Builder $q){
            $q->where('product_id', productId());
        })->where(function (Builder $q) use ($columns, $search) {
            foreach ($columns as $column) {
                $q->orWhere($column, "like", "%" . $search . "%");
            }
        })->paginate($limit);
    }
}
