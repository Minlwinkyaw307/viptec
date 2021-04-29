<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\TranslationModelController;
use App\Http\Requests\Admin\CorporateEditRequest;
use App\Http\Requests\Admin\CorporateUpdateRequest;
use App\Models\SiteConfig;
use App\Models\SiteConfigTranslations;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CorporateController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = SiteConfig::class;
        $this->translationModel = SiteConfigTranslations::class;
        $this->slug = null;
        $this->isVisibleIncluded = false;
        $this->successRedirectRouteName = 'admin.config.corporate.edit';

        $this->modelFields = [
            'quota_background' => [
                'type' => 'image',
                'required' => true
            ],
        ];

        $this->translationFields = [
            'vision' => 'text',
        ];

        $this->translationSelect = ['vision'];
        $this->hasOrder = false;
        $this->route = 'corporate';
        $this->key = 'site_config_id';
    }


    /**
     * @param CorporateEditRequest $request
     * @return Application|Factory|View
     */
    public function edit(CorporateEditRequest $request)
    {
        return $this->_edit($request, 1);
    }

    /**
     * @param CorporateUpdateRequest $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(CorporateUpdateRequest $request): RedirectResponse
    {
        return $this->_update($request, 1);
    }
}
