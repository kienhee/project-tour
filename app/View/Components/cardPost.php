<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardPost extends Component
{
    /**
     * Create a new component instance.
     */
    public $day;
    public $years;
    public $month;
    public $title;
    public $slug;
    public $cover;
    public $description;
    public function __construct($day, $years, $month, $title, $description, $slug, $cover)
    {
        $this->day = $day;
        $this->years = $years;
        $this->month = $month;
        $this->title = $title;
        $this->cover = $cover;
        $this->slug = $slug;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-post');
    }
}
