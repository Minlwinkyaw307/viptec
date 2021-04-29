<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\SiteConfigTranslations
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $site_config_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereSiteConfigId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereUpdatedAt($value)
 * @property int $language_id
 * @property string $title
 * @property string $site_name
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereTitle($value)
 * @property string $about_title
 * @property string $about_description
 * @property string $vision
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereAboutDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereAboutTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereVision($value)
 * @property string $quota_title
 * @property string $quota_description
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereQuotaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereQuotaTitle($value)
 * @property string $subscribe_title
 * @property string $subscribe_description
 * @property-read \App\Models\SiteConfig $site_config
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereSubscribeDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfigTranslations whereSubscribeTitle($value)
 */
class SiteConfigTranslations extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function site_config(): BelongsTo
    {
        return $this->belongsTo(SiteConfig::class);
    }
}
