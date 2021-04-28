<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProductPackageType
 *
 * @property int $id
 * @property int $product_id
 * @property int $package_type_id
 * @property string|null $image
 * @property string|null $amount
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductPackageType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType wherePackageTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductPackageType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ProductPackageType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductPackageType withoutTrashed()
 * @mixin \Eloquent
 * @property-read string $image_url
 * @property-read \App\Models\PackageType $package_type
 * @property-read \App\Models\Product $product
 */
class ProductPackageType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public CONST BASE_LOCATIONS = 'package_types';

    /**
     * Belonged Product
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Belonged Package Type
     *
     * @return BelongsTo
     */
    public function package_type(): BelongsTo
    {
        return $this->belongsTo(PackageType::class);
    }

    /**
     * Return Url of image
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if(\Storage::exists($this->image))
        {
            return \Storage::url($this->image);
        }

        return 'https://picsum.photos/580/630';
    }
}
