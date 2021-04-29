<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CertificateCreateRequest;
use App\Http\Requests\Admin\CertificateDestroyRequest;
use App\Http\Requests\Admin\CertificateEditRequest;
use App\Http\Requests\Admin\CertificateIndexRequest;
use App\Http\Requests\Admin\CertificateStoreRequest;
use App\Http\Requests\Admin\CertificateUpdateRequest;
use App\Models\Certificate;
use App\Models\CertificateTranslation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CertificateController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = Certificate::class;
        $this->translationModel = CertificateTranslation::class;
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
        ];
        $this->hasOrder = true;
        $this->route = 'certificate';
        $this->key = 'certificate_id';
    }


    /**
     * @param CertificateIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(CertificateIndexRequest $request)
    {
        return $this->_index($request);
    }


    /**
     * @param CertificateCreateRequest $request
     * @return Application|Factory|View
     */
    public function create(CertificateCreateRequest $request)
    {
        return $this->_create($request);
    }


    /**
     * @param CertificateStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CertificateStoreRequest $request): RedirectResponse
    {
        return $this->_store($request);
    }


    /**
     * @param CertificateEditRequest $request
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(CertificateEditRequest $request, $id)
    {
        return $this->_edit($request, $id);
    }


    /**
     * @param CertificateUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(CertificateUpdateRequest $request, $id): RedirectResponse
    {
        return $this->_update($request, $id);
    }

    /**
     * @param CertificateDestroyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(CertificateDestroyRequest $request, $id): RedirectResponse
    {
        return $this->_destroy($request, $id);
    }
}
