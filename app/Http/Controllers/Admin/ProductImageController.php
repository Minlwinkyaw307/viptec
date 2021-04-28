<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $product_image = ProductImage::whereId($id)->first();

        if($product_image) {
            $product_image->delete();

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
