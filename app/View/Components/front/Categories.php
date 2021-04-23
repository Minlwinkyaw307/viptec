<?php

namespace App\View\Components\front;

use Illuminate\View\Component;

class Categories extends Component
{
    public $categories;

    public $phone;
    /**
     * Create a new component instance.
     *
     * @param $categories
     */
    public function __construct($categories, $phone)
    {
        $this->categories = $categories;

        $this->phone = $phone;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.categories');
    }
}
