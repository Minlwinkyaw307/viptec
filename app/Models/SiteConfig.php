<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\SiteConfig
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $logo
 * @property string $phone
 * @property string $email
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $youtube
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SiteConfigTranslations[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereYoutube($value)
 * @property string $favicon
 * @property string $catalogue_link
 * @property-read mixed $favicon_url
 * @property-read string $logo_url
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereCatalogueLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereFavicon($value)
 * @property string $linkedin
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereLinkedin($value)
 * @property string $about_image
 * @property-read string $about_image_url
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereAboutImage($value)
 * @property-read string $catalogue_file_url
 * @property string $quota_background
 * @property-read string $quota_background_url
 * @method static \Illuminate\Database\Eloquent\Builder|SiteConfig whereQuotaBackground($value)
 */
class SiteConfig extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['logoUrl', 'faviconUrl', 'aboutImageUrl', 'catalogueFileUrl'];

    /**
     * Return Url of Site Logo
     *
     * @return string
     */
    public function getLogoUrlAttribute(): string
    {
        if(Storage::exists($this->logo))
        {
            return Storage::url($this->logo);
        }
        return 'https://picsum.photos/182/175';
    }

    /**
     * Return Url of Site Favicon
     *
     * @return string
     */
    public function getFaviconUrlAttribute(): string
    {
        if(Storage::exists($this->favicon))
        {
            return Storage::url($this->favicon);
        }
        return 'https://picsum.photos/32/32';
    }

    /**
     * Return URL of About Image
     *
     * @return string
     */
    public function getAboutImageUrlAttribute(): string
    {
        if(Storage::exists($this->about_image))
        {
            return Storage::url($this->about_image);
        }

        return 'https://picsum.photos/464/580';
    }

    /**
     * Return Catalogue as Url
     *
     * @return string
     */
    public function getCatalogueFileUrlAttribute(): string
    {
        if(Storage::exists($this->catalogue_link))
        {
            return Storage::url($this->catalogue_link);
        }

        return 'https://viptec.com.tr/uploads/files/viptec-catalogue.pdf';
    }
    public function getQuotaBackgroundUrlAttribute(): string
    {
        if(Storage::exists($this->quota_background))
        {
            return Storage::url($this->quota_background);
        }

        return 'https://picsum.photos/626/417';
    }

    public function translations(): HasMany
    {
        return $this->hasMany(SiteConfigTranslations::class, 'site_config_id', 'id');
    }
}
