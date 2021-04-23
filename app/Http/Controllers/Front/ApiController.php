<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\GetFreeQuoteRequest;
use App\Http\Requests\Front\RegisterNewsLetterRequest;
use App\Models\FreeQuota;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    /**
     * Api to register news letter
     *
     * @param RegisterNewsLetterRequest $request
     * @return JsonResponse
     */
    public function register_news_letter(RegisterNewsLetterRequest $request): JsonResponse
    {
        $data = Subscriber::create([
            'email' => $request->get('email'),
        ]);

        if($data)
        {
            return Response::json([
                'success' => __("Successfully Registered"),
            ], 200);
        }

        return Response::json([
            'error' => __("Couldn't register. Please try again!"),
        ], 500);
    }

    /**
     * @param GetFreeQuoteRequest $request
     * @return JsonResponse
     */
    public function get_free_quote(GetFreeQuoteRequest $request): JsonResponse
    {
        $quota = FreeQuota::create($request->all());
        if($quota) {
            return Response::json([
                'success' => __("Successfully Sent"),
            ]);
        }

        return Response::json([
            'error' => __("Couldn't register. Please try again!"),
        ], 500);

    }
}
