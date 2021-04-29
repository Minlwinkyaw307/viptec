<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $daily_visitor = DB::table('visitors')
            ->select('visited_at', DB::raw('count(*) as total'))
            ->whereDate('visited_at', '>=', now()->subMonth())
            ->groupBy('visited_at')
            ->get();
        $dates = $daily_visitor->map(function ($data) {
            return $data->visited_at;
        });

        $visitors = $daily_visitor->map(function($data) {
            return $data->total;
        });

        return view('admin.index', [
            'daily_visitor' => [
                'dates' => $dates,
                'visitors' => $visitors,
            ]
        ]);
    }
}
