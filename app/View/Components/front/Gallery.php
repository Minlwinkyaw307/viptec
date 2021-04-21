<?php

namespace App\View\Components\front;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Gallery extends Component
{
    /**
     * @var \App\Models\Gallery[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public $galleries;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->galleries = \App\Models\Gallery::where('visible', true)
            ->orderBy('order_no', 'DESC')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.front.gallery');
    }
}
