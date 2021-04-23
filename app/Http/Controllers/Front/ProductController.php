<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category_slug = $request->get('category') ?? null;
        $search = $request->get('q') ?? null;

        $products = Product::where('visible', true);

        if (!is_null($search)) {
            $products = $products->whereHas('translations', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', $search)
                        ->orWhere('description', $search);
                });
            });
        }
        if (!is_null($category_slug)) {
            $products = $products->whereHas('category', function ($query) use ($category_slug) {
                $query->whereHas('translations', function($q) use ($category_slug) {
                    $q->where('slug', $category_slug);
                });
            });
        }

        $products = $products->with(['translations' => function($query) {
            get_current_translation($query);
            $query->select(['id', 'language_id', 'product_id', 'title', 'slug']);
        }])->orderBy('created_at')->paginate($request->get('per_page') ?? 27);

        return view('front.product.index', [
            'products' => $products,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $product = Product::whereHas('translations', function($query) use ($slug){
          $query->where('slug', $slug);
        })->with(['translations' => function($query) {
            get_current_translation($query);
        }])->where('visible', true)->firstOrFail();

        return view('front.product.detail', [
            'product' => $product
        ]);
    }
}
