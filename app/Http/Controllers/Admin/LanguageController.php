<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * @param $lang
     * @return RedirectResponse
     */
    public function change_language($lang): RedirectResponse
    {
        $language = Language::where('code', $lang)->first();
        if($language)
        {
            session()->put('lang', $lang);
        }

        return redirect()->back();
    }
}
