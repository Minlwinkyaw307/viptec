<?php

namespace App\View\Components\front;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuotaModal extends Component
{
    public $products;

    public $product;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product=null)
    {
        $this->product = $product;

        if(is_null($this->product))
        {
            $this->products = Product::query()
                ->select('id')
                ->with(['translations' => function($query) {
                    get_current_translation($query);
                    $query->select(['id', 'language_id', 'product_id', 'title']);
                }])->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.front.quota-modal');
    }
}
