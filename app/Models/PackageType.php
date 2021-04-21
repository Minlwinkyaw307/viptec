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
 */
class PackageType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

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
}
