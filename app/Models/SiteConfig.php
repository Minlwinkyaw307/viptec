<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\SiteConfig
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig query()
 * @mixin \Eloquent
 */
class SiteConfig extends Model
{
    use HasFactory;

    public function translations(): HasMany
    {
        return $this->hasMany(SiteConfigTranslations::class, 'site_config_id', 'id');
    }
}
