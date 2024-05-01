<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyFilter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $model,
        public string $route,
        public array $columns = [],
    ) {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-filter');
    }
}
