<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteConfig;
use App\Models\SiteConfigTranslations;
use Illuminate\Http\Request;

class HomePageController extends TranslationModelController
{
    public function __construct()
    {
        $this->model = SiteConfig::class;
        $this->translationModel = SiteConfigTranslations::class;
        $this->slug = null;
        $this->isVisibleIncluded = false;

        $this->extraModelFields = [
            'image' => [
                'type' => 'image',
                'required' => true
            ],
            'thumbnail' => [
                'type' => 'image',
                'required' => true
            ],
        ];
        $this->counts = ['blog_views'];

        $this->extraTranslationFields = [
            'title' => 'text',
            'content' => 'text',
        ];
        $this->hasOrder = false;
        $this->route = 'blog';
        $this->key = 'blog_id';
    }


    public function edit()
    {

    }

    public function update()
    {

    }
}
