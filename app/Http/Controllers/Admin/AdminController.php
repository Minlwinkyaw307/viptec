<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogIndexRequest;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
    public function index()
    {
        $daily_visitor = DB::table('visitors')
            ->select('visited_at', DB::raw('count(*) as total'))
            ->whereDate('visited_at', '>=', now()->subWeeks(2))
            ->groupBy('visited_at')
            ->get();
        $dates = $daily_visitor->map(function ($data) {
            return $data->visited_at;
        });

        $visitors = $daily_visitor->map(function($data) {
            return $data->total;
        });

        $today_visitor_count = Visitor::whereDate('visited_at', now())->count();

        $total_visitors = DB::table('visitors')
            ->select(DB::raw('count(*) as total'))
            ->groupBy('ip')
            ->get()->count();

        $no_of_blogs = Blog::count();

        $no_of_products = Product::count();

        $top_browsers = \Analytics::fetchTopBrowsers(Period::months(1));

        if(!count($top_browsers))
        {
            $top_browsers = collect([['browser' => 'nothing', 'sessions' => 1 ]]);
        }

        $top_browsers = [
            'browser' => $top_browsers->map(function ($data) {
                return $data['browser'];
            }),
            'total' => $top_browsers->map(function($data) {
                return $data['sessions'];
            })
        ];

        $most_visited_web_pages = \Analytics::fetchMostVisitedPages(Period::months(1), $maxResults = 10);

        $most_visited_web_pages = [
            'title' => $most_visited_web_pages->map(function($data) {
                return $data['pageTitle'];
            }),
            'pageViews' => $most_visited_web_pages->map(function($data) {
                return $data['pageViews'];
            })
        ];

        $top_products = Product::with(['translations' => function($query) {
            get_current_translation($query);
        }])->withCount(['product_views'])
            ->orderBy('product_views_count')
            ->limit(3)
            ->get();

        $top_blogs = Blog::with(['translations' => function($query) {
            get_current_translation($query);
        }])->withCount(['blog_views'])
            ->orderBy('blog_views_count')
            ->limit(3)
            ->get();

        return view('admin.index', [
            'daily_visitor' => [
                'dates' => $dates,
                'visitors' => $visitors,
            ],
            'top_browsers' => $top_browsers,
            'most_visited_web_pages' => $most_visited_web_pages,
            'today_visitor_count' => $today_visitor_count,
            'total_visitors' => $total_visitors,
            'no_of_blogs' => $no_of_blogs,
            'no_of_products' => $no_of_products,
            'top_products' => $top_products,
            'top_blogs' => $top_blogs
        ]);
    }
}
