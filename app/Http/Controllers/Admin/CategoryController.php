<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryDestroyRequest;
use App\Http\Requests\Admin\CategoryEditRequest;
use App\Http\Requests\Admin\CategoryIndexRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends TranslationModelController
{

    public function __construct()
    {
        $this->model = Category::class;
        $this->translationModel = CategoryTranslation::class;
        $this->slug = ['name'];
        $this->isVisibleIncluded = true;
        $this->counts = ['products'];
        $this->route = 'category';
        $this->key = 'category_id';
    }

    /**
     * @param CategoryIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(CategoryIndexRequest $request)
    {
        return $this->_index($request);
    }

    public function create(CategoryCreateRequest $request)
    {
        return $this->_create($request);
    }

    public function store(CategoryUpdateRequest $request)
    {
        return $this->_store($request);
    }

    public function edit(CategoryEditRequest $request, $id)
    {
        return $this->_edit($request, $id);
    }

    /**
     * @param CategoryUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(CategoryUpdateRequest $request, $id): RedirectResponse
    {
        return $this->_update($request, $id);
    }

    public function destroy(CategoryDestroyRequest $request, $id): RedirectResponse
    {
        return $this->_destroy($request, $id);
    }
}
