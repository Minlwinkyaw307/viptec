<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductIndexRequest;
use App\Models\Category;
use App\Models\Feature;
use App\Models\PackageType;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    /**
     * Index page of product (Admin)
     * @param ProductIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(ProductIndexRequest $request)
    {
        $filter_product_name = $request->get('filter_product_name') ?? null;
        $filter_created_at = $request->get('filter_created_at') ?? null;
        $filter_category_id = $request->get('filter_category_id') ?? null;
        $filter_status_id = $request->get('filter_status_id') ?? null;

        $products = Product::query()
            ->with(['translations' => function($query) {
                get_current_translation($query);
                $query->select(['id', 'language_id', 'product_id', 'slug', 'title']);
            }, 'category.translations' => function($query) {
                get_current_translation($query);
            }]);


        if($filter_product_name) {
            $products = $products->productFilter($filter_product_name);
        }

        if($filter_created_at) {
            $products = $products->where('created_at', Carbon::parse($filter_created_at));
        }

        if($filter_status_id)
        {
            $products = $products->statusFilter($filter_status_id);
        }

        if($filter_category_id) {
            $products = $products->whereHas('category', function($query) use ($filter_category_id) {
                $query->where('id', $filter_category_id);
            });
        }

        $products = $products->withTrashed()->paginate(request()->get('per_page') ?? 10);

        return view('admin.product.index', [
            'products' => $products,
            'category_options' => Category::category_options(),
        ]);
    }


    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.product.create-edit' , [
            'category_options' => Category::category_options(),
            'package_type_options' => PackageType::package_type_options(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->with(['translations', 'category.translations' => function($query) {
            get_current_translation($query);
        }, 'product_features.feature.translations' => function($query) {
            get_current_translation($query);
        }, 'product_package_types.package_type.translations' => function($query) {
            get_current_translation($query);
        }, 'product_images', 'product_compatibles.blade:id,code'])
            ->where('visible', true)->firstOrFail();

//        return $product->product_features->pluck('feature.id');

        return view('admin.product.create-edit', [
            'product' => $product,
            'title' => $product->translations[0]->title,
            'description' => $product->translations[0]->description,
            'meta_image' => $product->imageUrl,
            'category_options' => Category::category_options(),
            'package_type_options' => PackageType::package_type_options(),
            'feature_options' => Feature::feature_options(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        return \Illuminate\Support\Facades\Response::json([
            'result' => true
        ]);
    }
}
