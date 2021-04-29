<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomePageEditRequest;
use App\Http\Requests\Admin\HomePageUpdateRequest;
use App\Models\SiteConfig;
use App\Models\SiteConfigTranslations;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomePageController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = SiteConfig::class;
        $this->translationModel = SiteConfigTranslations::class;
        $this->slug = null;
        $this->isVisibleIncluded = false;
        $this->successRedirectRouteName = 'admin.config.home.edit';

        $this->modelFields = [
            'about_image' => [
                'type' => 'image',
                'required' => true
            ],
            'quota_background' => [
                'type' => 'image',
                'required' => true
            ],
        ];
        $this->counts = ['blog_views'];

        $this->translationFields = [
            'about_title' => 'text',
            'about_description' => 'text',
            'quota_title' => 'text',
            'quota_description' => 'text',
            'subscribe_title' => 'text',
            'subscribe_description' => 'text',
        ];
        $this->hasOrder = false;
        $this->route = 'home';
        $this->key = 'site_config_id';
    }


    /**
     * @param HomePageEditRequest $request
     * @return Application|Factory|View
     */
    public function edit(HomePageEditRequest $request)
    {
        return $this->_edit($request, 1);
    }

    /**
     * @param HomePageUpdateRequest $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(HomePageUpdateRequest $request): RedirectResponse
    {
        return $this->_update($request, 1);
    }
}
