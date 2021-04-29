<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('visible', true)
            ->select(['id', 'thumbnail', 'created_at'])
            ->with(['translations' => function($query) {
                get_current_translation($query);
                $query->select(['title', 'id', 'language_id', 'blog_id', 'content', 'slug']);
            }])->orderBy('created_at')
            ->paginate(request()->get('per_page') ?? 9);
        return view('front.blog.index', [
            "blogs" => $blogs,
            'title' => __("Blogs") . " | VipTec",
            'meta_image' => count($blogs->items()) ? $blogs->items()[0]->thumbnailUrl : null,
        ]);
    }

    public function detail(Request $request, $slug)
    {


        $blog = Blog::with(['translations' => function($query){
            get_current_translation($query);
        }])->whereHas('translations', function($query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        BlogView::create([
            'blog_id' => $blog->id,
            'ip' => $request->ip(),
        ]);

        return view('front.blog.detail', [
            'blog' => $blog,
            'title' => $blog->translations[0]->title,
            'description' => strip_tags(stripcslashes($blog->translations[0]->content)),
            'meta_image' => $blog->thumbnailUrl,
        ]);
    }
}
