<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactFormRequest;
use App\Models\Certificate;
use App\Models\ContactMessage;
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
        $about = SiteConfig::select(['id', 'about_image'])->with(['translations' => function($query) {
            get_current_translation($query);
            $query->select([
                'id',
                'language_id',
                'site_config_id',
                'about_title',
                'about_description',
                'vision'
            ]);
        }])->first();

        $certificates = Certificate::where('visible', true)->orderBy('order_no')->get();

        return view('front.corporate', [
            'about' => $about,
            'certificates' => $certificates,
        ]);
    }

    /**
     * Certificates Page of VipTec
     *
     * @return Application|Factory|View
     */
    public function certificates()
    {
        $certificates = Certificate::where('visible', true)
            ->with(['translations' => function($query) {
                get_current_translation($query);
            }])
            ->orderBy('order_no')->get();

        return view('front.certificates', [
            'certificates' => $certificates,
        ]);
    }

    /**
     * Contact Us Page of VipTec
     *
     * @return Application|Factory|View
     */
    public function contact()
    {
        $location = SiteConfig::select('location')->first()->location;
        return view('front.contact', [
            'location' => $location,
        ]);
    }

    /**
     * Saving Submitted Contact Information
     *
     * @param ContactFormRequest $request
     * @return RedirectResponse
     */
    public function post_contact(ContactFormRequest $request): RedirectResponse
    {
        $message = ContactMessage::create($request->all());
        if($message) {
            return redirect()->back()->with('success', __('Successfully Submitted. We will contact You Soon.'));
        }
        return redirect()->back()->withInput()->withErrors("Couldn't Save Submission. Please Try Again.");
    }
}
