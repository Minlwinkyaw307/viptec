<?php


namespace App\View\Composers;


use App\Models\SiteConfig;
use Illuminate\View\View;

class ConfigComposer
{
    /**
     * Limit of featured posts
     *
     * @var SiteConfig
     */
    private $configs;


    /**
     * Create a new recent posts composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->configs = SiteConfig::with([
            'translations' => function($query) {
                get_current_translation($query);
            }
        ])->first();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('configs', $this->configs);
    }
}
