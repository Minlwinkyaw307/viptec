<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryCreateRequest;
use App\Http\Requests\Admin\GalleryDestroyRequest;
use App\Http\Requests\Admin\GalleryEditRequest;
use App\Http\Requests\Admin\GalleryIndexRequest;
use App\Http\Requests\Admin\GalleryStoreRequest;
use App\Http\Requests\Admin\GalleryUpdateRequest;
use App\Models\Gallery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GalleryController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = Gallery::class;
        $this->translationModel = null;
        $this->slug = null;
        $this->isVisibleIncluded = true;

        $this->extraModelFields = [
            'image' => [
                'type' => 'image',
                'required' => true
            ],
        ];

        $this->extraTranslationFields = [];
        $this->hasOrder = true;
        $this->route = 'gallery';
        $this->key = null;
    }


    /**
     * @param GalleryIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(GalleryIndexRequest $request)
    {
        return $this->_index($request);
    }


    /**
     * @param GalleryCreateRequest $request
     * @return Application|Factory|View
     */
    public function create(GalleryCreateRequest $request)
    {
        return $this->_create($request);
    }


    /**
     * @param GalleryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(GalleryStoreRequest $request): RedirectResponse
    {
        return $this->_store($request);
    }


    /**
     * @param GalleryEditRequest $request
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(GalleryEditRequest $request, $id)
    {
        return $this->_edit($request, $id);
    }


    /**
     * @param GalleryUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(GalleryUpdateRequest $request, $id): RedirectResponse
    {
        return $this->_update($request, $id);
    }

    /**
     * @param GalleryDestroyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(GalleryDestroyRequest $request, $id): RedirectResponse
    {
        return $this->_destroy($request, $id);
    }
}
