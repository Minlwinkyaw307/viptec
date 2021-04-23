<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('visible', true)
            ->select(['id', 'thumbnail', 'created_at'])
            ->with(['translations' => function($query) {
                get_current_translation($query);
                $query->select(['title', 'id', 'language_id', 'blog_id', 'content']);
            }])->orderBy('created_at')
            ->paginate(request()->get('per_page') ?? 9);

        return view('front.blog.index', [
            "blogs" => $blogs,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $blog = Blog::with(['translations' => function($query){
            get_current_translation($query);
        }])->whereHas('translations', function($query) use ($slug) {
            $query->where('slug', $slug);
        })->first();

        return view('front.blog.detail', [
            'blog' => $blog
        ]);
    }
}
