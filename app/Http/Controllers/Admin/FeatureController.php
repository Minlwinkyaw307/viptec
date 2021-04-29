<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureCreateRequest;
use App\Http\Requests\Admin\FeatureDestroyRequest;
use App\Http\Requests\Admin\FeatureEditRequest;
use App\Http\Requests\Admin\FeatureIndexRequest;
use App\Http\Requests\Admin\FeatureStoreRequest;
use App\Http\Requests\Admin\FeatureUpdateRequest;
use App\Models\Feature;
use App\Models\FeatureTranslation;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeatureController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = Feature::class;
        $this->translationModel = FeatureTranslation::class;
        $this->slug = null;
        $this->isVisibleIncluded = true;
        $this->route = 'feature';
        $this->key = 'feature_id';
    }


    /**
     * @param FeatureIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(FeatureIndexRequest $request)
    {
        return $this->_index($request);
    }

    /**
     * @param FeatureCreateRequest $request
     * @return Application|Factory|View
     */
    public function create(FeatureCreateRequest $request)
    {
        return $this->_create($request);
    }

    /**
     * @param FeatureStoreRequest $request
     * @return RedirectResponse
     */
    public function store(FeatureStoreRequest $request): RedirectResponse
    {
        return $this->_store($request);
    }

    /**
     * @param FeatureEditRequest $request
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(FeatureEditRequest $request, $id)
    {
        return $this->_edit($request, $id);
    }


    /**
     * @param FeatureUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(FeatureUpdateRequest $request, $id): RedirectResponse
    {
        return $this->_update($request, $id);
    }

    /**
     * @param FeatureDestroyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(FeatureDestroyRequest $request, $id): RedirectResponse
    {
        return $this->_destroy($request, $id);
    }
}
