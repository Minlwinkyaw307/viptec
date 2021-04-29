<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteConfigEditRequest;
use App\Http\Requests\Admin\SiteConfigUpdateRequest;
use App\Models\SiteConfig;
use App\Models\SiteConfigTranslations;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SiteConfigController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = SiteConfig::class;
        $this->translationModel = SiteConfigTranslations::class;
        $this->slug = null;
        $this->isVisibleIncluded = false;
        $this->successRedirectRouteName = 'admin.config.setting.edit';

        $this->modelFields = [
            'logo' => [
                'type' => 'image',
                'required' => true
            ],
            'favicon' => [
                'type' => 'image',
                'required' => true
            ],
            'catalogue_link' => [
                'type' => 'image',
            ],
            'phone' => [
                'type' => 'text',
            ],
            'fax' => [
                'type' => 'text',
            ],
            'email' => [
                'type' => 'text',
            ],
            'facebook' => [
                'type' => 'text',
            ],
            'linkedin' => [
                'type' => 'text',
            ],
            'instagram' => [
                'type' => 'text',
            ],
            'youtube' => [
                'type' => 'text',
            ],
            'tutorial_link' => [
                'type' => 'text',
            ],
            'location' => [
                'type' => 'text',
            ],
            'address' => [
                'type' => 'text',
            ],
        ];

        $this->translationFields = [
            'title' => 'text',
            'site_name' => 'text',
            'description' => 'text',
        ];

        $this->translationSelect = [
            'title', 'site_name', 'description'
        ];

        $this->hasOrder = false;
        $this->route = 'setting';
        $this->key = 'site_config_id';
    }


    /**
     * @param SiteConfigEditRequest $request
     * @return Application|Factory|View
     */
    public function edit(SiteConfigEditRequest $request)
    {
        return $this->_edit($request, 1);
    }

    /**
     * @param SiteConfigUpdateRequest $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(SiteConfigUpdateRequest $request): RedirectResponse
    {
        return $this->_update($request, 1);
    }
}
