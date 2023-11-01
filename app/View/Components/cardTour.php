<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardTour extends Component
{
    /**
     * Create a new component instance.
     */
    public $cover;
    public $slug;
    public $nightOfDay;
    public $price;
    public $title;
    public $startingPoint;
    public $dateOfDepartment;
    public $amountOfPeople;
    public $avaiable;
    public $sale;
    public function __construct($cover, $slug, $nightOfDay, $price, $title, $startingPoint, $dateOfDepartment, $amountOfPeople, $avaiable,$sale)
    {
        $this->cover = $cover;
        $this->slug = $slug;
        $this->nightOfDay = $nightOfDay;
        $this->price = $price;
        $this->title = $title;
        $this->startingPoint = $startingPoint;
        $this->dateOfDepartment = $dateOfDepartment;
        $this->amountOfPeople = $amountOfPeople;
        $this->avaiable = $avaiable;
        $this->sale = $sale;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-tour');
    }
}
