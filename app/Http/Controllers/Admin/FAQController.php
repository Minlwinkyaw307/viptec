<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FAQCreateRequest;
use App\Http\Requests\Admin\FAQDeleteRequest;
use App\Http\Requests\Admin\FAQEditRequest;
use App\Http\Requests\Admin\FAQIndexRequest;
use App\Http\Requests\Admin\FAQStoreRequest;
use App\Http\Requests\Admin\FAQUpdateRequest;
use App\Http\Requests\Admin\FeatureCreateRequest;
use App\Models\FAQ;
use App\Models\FAQTranslation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FAQController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = FAQ::class;
        $this->translationModel = FAQTranslation::class;
        $this->slug = null;
        $this->isVisibleIncluded = true;
        $this->extraTranslationFields = [
            'answer' => 'text',
            'question' => 'text',
        ];
        $this->hasOrder = true;
        $this->route = 'faq';
        $this->key = 'faq_id';
    }


    /**
     * @param FAQIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(FAQIndexRequest $request)
    {
        return $this->_index($request);
    }


    /**
     * @param FAQCreateRequest $request
     * @return Application|Factory|View
     */
    public function create(FAQCreateRequest $request)
    {
        return $this->_create($request);
    }


    /**
     * @param FAQStoreRequest $request
     * @return RedirectResponse
     */
    public function store(FAQStoreRequest $request): RedirectResponse
    {
        return $this->_store($request);
    }


    /**
     * @param FAQEditRequest $request
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(FAQEditRequest $request, $id)
    {
        return $this->_edit($request, $id);
    }


    /**
     * @param FAQUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(FAQUpdateRequest $request, $id): RedirectResponse
    {
        return $this->_update($request, $id);
    }

    /**
     * @param FAQDeleteRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(FAQDeleteRequest $request, $id): RedirectResponse
    {
        return $this->_destroy($request, $id);
    }
}
