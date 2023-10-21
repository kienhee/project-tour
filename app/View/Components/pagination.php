<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class pagination extends Component
{
    /**
     * Create a new component instance.
     */
    public $paginate;
    public function __construct($paginate)
    {
        //
        $this->paginate=$paginate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pagination');
    }
}
