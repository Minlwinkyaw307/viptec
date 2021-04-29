<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\PackageType
 *
 * @property int $id
 * @property int $visible
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType newQuery()
 * @method static \Illuminate\Database\Query\Builder|PackageType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereVisible($value)
 * @method static \Illuminate\Database\Query\Builder|PackageType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PackageType withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductPackageType[] $product_package_types
 * @property-read int|null $product_package_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PackageTypeTranslation[] $translations
 * @property-read int|null $translations_count
 * @property-read array $status
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType statusFilter($filter)
 */
class PackageType extends Model
{
    use HasFactory, SoftDeletes;

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
     * All the products (From product_package_types) of current package type
     *
     * @return HasMany
     */
    public function product_package_types(): HasMany
    {
        return $this->hasMany(ProductPackageType::class, 'package_type_id', 'id');
    }

    /**
     * All the translations of Package Type
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(PackageTypeTranslation::class, 'package_type_id', 'id');
    }

    /**
     * @param bool $isFilter
     * @return array
     */
    public static function package_type_options($isFilter=false): array
    {
        $result = [];
        if($isFilter)
        {
            $result = ['0' => __("All Options")];
        }
        $packages = PackageType::select(['id', 'deleted_at'])->with(['translations' => function($query) {
            get_current_translation($query);
            $query->select(['id', 'language_id', 'package_type_id', 'name']);
        }])->withTrashed()->get()->mapWithKeys(function($package) {
            return [$package->id => $package->translations[0]->name];
        });

        return collect($result)->union($packages)->toArray();
    }


}
