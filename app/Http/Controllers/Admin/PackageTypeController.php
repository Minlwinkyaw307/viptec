<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageTypeCreateRequest;
use App\Http\Requests\Admin\PackageTypeDestroyRequest;
use App\Http\Requests\Admin\PackageTypeEditRequest;
use App\Http\Requests\Admin\PackageTypeIndexRequest;
use App\Http\Requests\Admin\PackageTypeStoreRequest;
use App\Http\Requests\Admin\PackageTypeUpdateRequest;
use App\Models\PackageType;
use App\Models\PackageTypeTranslation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PackageTypeController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = PackageType::class;
        $this->translationModel = PackageTypeTranslation::class;
        $this->isSlugIncluded = false;
        $this->isVisibleIncluded = true;
        $this->route = 'package-type';
        $this->key = 'package_type_id';
    }


    /**
     * @param PackageTypeIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(PackageTypeIndexRequest $request)
    {
        return $this->_index($request);
    }


    /**
     * @param PackageTypeCreateRequest $request
     * @return Application|Factory|View
     */
    public function create(PackageTypeCreateRequest $request)
    {
        return $this->_create($request);
    }


    /**
     * @param PackageTypeStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PackageTypeStoreRequest $request): RedirectResponse
    {
        return $this->_store($request);
    }


    /**
     * @param PackageTypeEditRequest $request
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(PackageTypeEditRequest $request, $id)
    {
        return $this->_edit($request, $id);
    }


    /**
     * @param PackageTypeUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(PackageTypeUpdateRequest $request, $id): RedirectResponse
    {
        return $this->_update($request, $id);
    }


    /**
     * @param PackageTypeDestroyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(PackageTypeDestroyRequest $request, $id): RedirectResponse
    {
        return $this->_destroy($request, $id);
    }
}
