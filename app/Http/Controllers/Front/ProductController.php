<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductView;
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
                    $q->where('title', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%");
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
            'title' => __("Products") . ' | VipTec',
            'meta_image' => count($products->items()) ? $products->items()[0]->thumbnailUrl : null,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $product = Product::whereHas('translations', function($query) use ($slug){
          $query->where('slug', $slug);
        })->with(['translations' => function($query) {
            get_current_translation($query);
        }, 'category.translations' => function($query) {
            get_current_translation($query);
        }, 'product_features.feature.translations' => function($query) {
            get_current_translation($query);
        }, 'product_package_types.package_type.translations' => function($query) {
            get_current_translation($query);
        }, 'product_images', 'product_compatibles.blade:id,code'])
            ->where('visible', true)->firstOrFail();


        ProductView::create([
            'ip' => $request->ip(),
            'product_id' => $product->id,
            'viewed_at' => now(),
        ]);

        return view('front.product.detail', [
            'product' => $product,
            'title' => $product->translations[0]->title,
            'description' => $product->translations[0]->description,
            'meta_image' => $product->imageUrl,
        ]);
    }
}
