<?php

namespace App\View\Components\front;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component
{

    public $sliders;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sliders = \App\Models\Slider::with(['translations' => function($query) {
            get_current_translation($query);
        }])->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.front.slider');
    }
}
