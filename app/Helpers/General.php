<?php

use Illuminate\Support\Collection;

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

if(!function_exists('language_data_collector'))
{
    /**
     * @param array $keys
     * @param array $extra
     * @return Collection
     */
    function language_data_collector(array $keys, $extra=[]): Collection
    {
        $languages = \App\Models\Language::all();

        $results = [];

        foreach($languages as $index=>$language)
        {
            $results[$index]['language_id'] = $language->id;

            foreach($keys as $key)
            {
                $results[$index][$key] = request()->get($language->code . '_' . $key);
            }
            $results[$index] = array_merge($results[$index], $extra);
        }

        return collect($results);
    }
}
