<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogCreateRequest;
use App\Http\Requests\Admin\BlogDestroyRequest;
use App\Http\Requests\Admin\BlogEditRequest;
use App\Http\Requests\Admin\BlogIndexRequest;
use App\Http\Requests\Admin\BlogStoreRequest;
use App\Http\Requests\Admin\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\BlogTranslation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = Blog::class;
        $this->translationModel = BlogTranslation::class;
        $this->slug = 'title';
        $this->isVisibleIncluded = true;

        $this->modelFields = [
            'image' => [
                'type' => 'image',
                'required' => true
            ],
            'thumbnail' => [
                'type' => 'image',
                'required' => true
            ],
        ];
        $this->counts = ['blog_views'];

        $this->translationFields = [
            'title' => 'text',
            'content' => 'text',
        ];
        $this->hasOrder = false;
        $this->route = 'blog';
        $this->key = 'blog_id';
    }


    /**
     * @param BlogIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(BlogIndexRequest $request)
    {
        return $this->_index($request);
    }


    /**
     * @param BlogCreateRequest $request
     * @return Application|Factory|View
     */
    public function create(BlogCreateRequest $request)
    {
        return $this->_create($request);
    }


    /**
     * @param BlogStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BlogStoreRequest $request): RedirectResponse
    {
        return $this->_store($request);
    }


    /**
     * @param BlogEditRequest $request
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(BlogEditRequest $request, $id)
    {
        return $this->_edit($request, $id);
    }


    /**
     * @param BlogUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(BlogUpdateRequest $request, $id): RedirectResponse
    {
        return $this->_update($request, $id);
    }

    /**
     * @param BlogDestroyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(BlogDestroyRequest $request, $id): RedirectResponse
    {
        return $this->_destroy($request, $id);
    }
}
