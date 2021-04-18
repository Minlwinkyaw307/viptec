<?php


namespace App\View\Composers;


use App\Models\Category;
use App\Models\SiteConfig;
use Illuminate\View\View;

class ConfigComposer
{
    /**
     * @var SiteConfig
     */
    private $configs;

    private $categories;


    /**
     * Create a new recent posts composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->configs = SiteConfig::with([
            'translations' => function ($query) {
                get_current_translation($query);
                $query->select([
                    'id',
                    'language_id',
                    'site_config_id',
                    'title',
                    'site_name',
                    'description',
                ]);
            }
        ])->first();

        $this->categories = Category::where('visible', true)
            ->with(['translations' => function ($query) {
                get_current_translation($query);
            }])->withCount('products')
            ->orderBy('products_count', 'DESC')
            ->get();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('configs', $this->configs)->with('categories', $this->categories);
    }
}
