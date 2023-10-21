<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardDestination extends Component
{
    /**
     * Create a new component instance.
     */
    public $slug;
    public $cover;
    public $name;
    public $totalTours;
    public function __construct($slug, $cover, $name, $totalTours)
    {
        $this->slug = $slug;
        $this->cover = $cover;
        $this->name = $name;
        $this->totalTours = $totalTours;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-destination');
    }
}
