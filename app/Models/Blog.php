<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string $thumbnail
 * @property string $image
 * @property int $visible
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $image_url
 * @property-read string $thumbnail_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlogTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Query\Builder|Blog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereVisible($value)
 * @method static \Illuminate\Database\Query\Builder|Blog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Blog withoutTrashed()
 * @mixin \Eloquent
 */
class Blog extends Model
{
    use HasFactory, SoftDeletes;

    public CONST BASE_LOCATION = 'blogs';

    protected $guarded = [];

    protected $appends = ['status'];

    public function scopeStatusFilter($query, $filter) {
        if($filter == 1)
        {
            return $query->where('visible', false);
        }else
        {
            return $query->where('visible', true);
        }
    }

    /**
     * Return all the statuses of feature
     *
     * @return array
     */
    public static function package_statues(): array
    {
        return [
            '0' => __('All Options'),
            '1' => __('Hidden'),
            '2' => __("Active"),
        ];
    }

    /**
     * Return the status of the product with class and name
     *
     * @return array
     */
    public function getStatusAttribute(): array
    {
        if($this->deleted_at)
        {
            return [
                'class' => 'error',
                'name' => __("Deleted")
            ];
        } else if ($this->attributes['visible']) {
            return [
                'class' => 'success',
                'name' => __("Active")
            ];
        }
        return [
            'class' => 'waiting',
            'name' => __('Hidden')
        ];
    }

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(BlogTranslation::class, 'blog_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function blog_views(): HasMany
    {
        return $this->hasMany(BlogView::class, 'blog_id', 'id');
    }

    /**
     * Return Url of Image
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if(\Storage::exists($this->image))
        {
            return \Storage::url($this->image);
        }

        return 'https://picsum.photos/1903/370';
    }

    /**
     * Return Url of Thumbnail
     *
     * @return string
     */
    public function getThumbnailUrlAttribute(): string
    {
        if(\Storage::exists($this->thumbnail))
        {
            return \Storage::url($this->thumbnail);
        }

        return 'https://picsum.photos/383/300';
    }
}
