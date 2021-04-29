<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SliderTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Query\Builder|Slider onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Slider withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Slider withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $image_url
 * @property int $order_no
 * @property int $visible
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereVisible($value)
 * @property-read array $status
 * @method static \Illuminate\Database\Eloquent\Builder|Slider statusFilter($filter)
 */
class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['imageUrl', 'status'];

    public CONST BASE_LOCATION = 'sliders';

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
     * Convert Image File Location To URL
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if(\Storage::exists($this->image))
        {
            return Storage::url($this->image);
        }

        return 'https://picsum.photos/1920/600';
    }

    /**
     * Translations of slider model
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(SliderTranslation::class, 'slider_id', 'id');
    }
}
