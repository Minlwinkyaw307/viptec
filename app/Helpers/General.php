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

if(!function_exists('format_default_date'))
{
    /**
     * @param $date
     * @return string
     */
    function format_default_date($date): string
    {
        return $date->format(config('date.date_format'));
    }
}

if(!function_exists('auth_check'))
{
    function auth_check(): bool
    {
        return true;
    }
}
