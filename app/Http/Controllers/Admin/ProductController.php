<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductIndexRequest;
use App\Models\Category;
use App\Models\Feature;
use App\Models\PackageType;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImage;
use App\Models\ProductPackageType;
use App\Models\ProductTranslation;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'feature_options' => Feature::feature_options(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function store(Request $request): RedirectResponse
    {
        dd($request->all());
        $params = $request->only([
            'code',
            'visible',
            'category_id',
            'length',
            'width',
            'thickness',
        ]);

        \DB::transaction(function() use($request, $params) {
            if($request->hasFile('image')) {
                // Storing Product
                $params['image'] = \Storage::putFile('products', $request->file('image'));

                $product = Product::create($params);


                // Storing Product's Translations
                $translations = language_data_collector(['color', 'title', 'description'], ['product_id' => $product->id]);
                $translations = $translations->map(function($translation) {
                    $translation['slug'] = Str::slug($translation['title']);
                    return $translation;
                });

                ProductTranslation::insert($translations->toArray());

                // Storing Product's Features
                $features = collect($request->get('feature_ids'));

                $features = $features->map(function($feature) use ($product) {
                    return [
                        'product_id' => $product->id,
                        'feature_id' => $feature,
                    ];
                });

                ProductFeature::insert($features->toArray());

                // Storing Product's Package Type
                if(count($request->get('packages')) > 0)
                {
                    $package_images = $request->file('package_images');
                    $packages = $request->get('packages');

                    foreach($packages as $index=>$package)
                    {
                        $image = null;
                        if(isset($package_images[$index]) && !is_null($package_images[$index]))
                        {
                            $image = \Storage::putFile(ProductPackageType::BASE_LOCATIONS, $package_images[$index]);
                        }
                        dump(ProductPackageType::create([
                            'product_id' => $product->id,
                            'package_type_id' => $package,
                            'amount' => $request->get('amounts')[$index],
                            'image' => $image
                        ]));
                    }
                }

                // Storing Product's Images
                $images = $request->file('images');
                $thumbnails = $request->file('thumbnails');

                foreach($images as $index=>$image)
                {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => Storage::putFile(ProductImage::BASE_LOCATION, $image),
                        'thumbnail' => Storage::putFile(ProductImage::BASE_LOCATION, $thumbnails[$index]),
                    ]);
                }
            }

            return true;
        });

        return redirect()->route('admin.product.index')->with('success', __("Successfully Created"));
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
     * @param Request $request
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
