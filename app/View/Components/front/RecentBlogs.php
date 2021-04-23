<?php

namespace App\View\Components\front;

use App\Models\Blog;
use Illuminate\View\Component;

class RecentBlogs extends Component
{

    public $blogs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->blogs = Blog::orderBy('created_at')
            ->where('visible', true)
            ->with(['translations' => function($query) {
            get_current_translation($query);
            $query->select('id', 'language_id', 'blog_id', 'slug', 'title');
        }])
            ->limit(5)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.recent-blogs');
    }
}
