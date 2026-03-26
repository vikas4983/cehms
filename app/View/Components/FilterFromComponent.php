<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterFromComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $url;
    public $currentRoute;
    public function __construct($url, $currentRoute)
    {
        $this->url = $url;
        $this->currentRoute = $currentRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-from-component');
    }
}
