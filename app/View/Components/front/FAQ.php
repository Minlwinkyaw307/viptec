<?php

namespace App\View\Components\front;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FAQ extends Component
{

    public $FAQs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->FAQs = \App\Models\FAQ::where('visible', true)->with(['translations' => function($query) {
            get_current_translation($query);
        }])->orderBy('order_no')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.front.f-a-q');
    }
}
