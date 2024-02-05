<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Editable extends Component
{
    public $key;
    public $route;
    public $model;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $key, $route = null, $model = '\\App\\Models\\LandingPage'
    ) {
        $this->key   = $key;
        $this->route = $route ?? route('editable.update');
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.editable');
    }
}
