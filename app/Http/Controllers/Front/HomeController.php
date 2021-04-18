<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SiteConfig;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Index page of VipTec
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $about = SiteConfig::select(['id', 'about_image'])->with(['translations' => function($query) {
            get_current_translation($query);
            $query->select([
                'id',
                'language_id',
                'site_config_id',
                'about_title',
                'about_description',
            ]);
        }])->first();

        return view('front.index', [
            'about' => $about,
        ]);
    }

    /**
     * Corporate Page of VipTec
     *
     * @return Application|Factory|View
     */
    public function corporate()
    {
        return view('front.corporate');
    }

    /**
     * Certificates Page of VipTec
     *
     * @return Application|Factory|View
     */
    public function certificates()
    {
        return view('front.certificates');
    }

    /**
     * Contact Us Page of VipTec
     *
     * @return Application|Factory|View
     */
    public function contact()
    {
        return view('front.contact');
    }

    /**
     * Saving Submitted Contact Information
     *
     * @return RedirectResponse
     */
    public function post_contact(): RedirectResponse
    {
        return redirect()->back();
    }
}
