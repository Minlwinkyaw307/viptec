<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Http\Requests\Admin\SliderDestroyRequest;
use App\Http\Requests\Admin\SliderEditRequest;
use App\Http\Requests\Admin\SliderIndexRequest;
use App\Http\Requests\Admin\SliderStoreRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Models\Slider;
use App\Models\SliderTranslation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SliderController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = Slider::class;
        $this->translationModel = SliderTranslation::class;
        $this->slug = null;
        $this->isVisibleIncluded = true;

        $this->extraModelFields = [
            'image' => [
                'type' => 'image',
                'required' => true
            ],
        ];

        $this->extraTranslationFields = [
            'title' => 'text',
            'description' => 'text',
            'btn_title' => 'text',
            'link' => 'text',
        ];
        $this->hasOrder = true;
        $this->route = 'slider';
        $this->key = 'slider_id';
    }


    /**
     * @param SliderIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(SliderIndexRequest $request)
    {
        return $this->_index($request);
    }


    /**
     * @param SliderCreateRequest $request
     * @return Application|Factory|View
     */
    public function create(SliderCreateRequest $request)
    {
        return $this->_create($request);
    }


    /**
     * @param SliderStoreRequest $request
     * @return RedirectResponse
     */
    public function store(SliderStoreRequest $request): RedirectResponse
    {
        return $this->_store($request);
    }


    /**
     * @param SliderEditRequest $request
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(SliderEditRequest $request, $id)
    {
        return $this->_edit($request, $id);
    }


    /**
     * @param SliderUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(SliderUpdateRequest $request, $id): RedirectResponse
    {
        return $this->_update($request, $id);
    }

    /**
     * @param SliderDestroyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(SliderDestroyRequest $request, $id): RedirectResponse
    {
        return $this->_destroy($request, $id);
    }
}
