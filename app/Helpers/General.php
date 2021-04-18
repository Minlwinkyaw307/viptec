<?php

if(!function_exists('language'))
{
    function language()
    {
        return \App\Models\Language::where('code', app()->getLocale())->firstOrFail();
    }
}

if(!function_exists('languages'))
{
    function languages()
    {
        return Cache::get('languages', \App\Models\Language::all());
    }
}

if(!function_exists('get_current_translation'))
{
    function get_current_translation($query)
    {
        $query->where('language_id', request()->language->id);
    }
}
