<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductPackageType;
use Illuminate\Http\Request;

class ProductPackageTypeController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $product_package_type = ProductPackageType::whereId($id)->first();

        if($product_package_type) {
            $product_package_type->delete();

            return \Response::json([
                'status' => 200,
            ]);
        } else {
            return \Response::json([
                'status' => 404,
                'message' => __("Couldn't Find Item with Given ID")
            ]);
        }
    }
}
