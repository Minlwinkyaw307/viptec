<?php

namespace App\Models;

use Database\Seeders\FAQTranslationSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FAQ
 *
 * @property int $id
 * @property int $order_no
 * @property int $visible
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ newQuery()
 * @method static \Illuminate\Database\Query\Builder|FAQ onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ query()
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ whereVisible($value)
 * @method static \Illuminate\Database\Query\Builder|FAQ withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FAQ withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FAQTranslation[] $translations
 * @property-read int|null $translations_count
 * @property-read array $status
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ searchFilter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQ statusFilter($filter)
 */
class FAQ extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'faqs';

    protected $guarded = [];

    public function scopeSearchFilter($query, $filter) {
        return $query->whereHas('translations', function($query) use ($filter) {
            $query->where('name', 'like', "%$filter%");
        });
    }

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
     * Return all the translation of the current FAQ
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(FAQTranslation::class, 'faq_id', 'id');
    }
}
