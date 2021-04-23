<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string $code
 * @property int $length
 * @property int $width
 * @property int|null $weight
 * @property string|null $thickness
 * @property int|null $blade_id
 * @property int $visible
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBladeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereThickness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWidth($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductFeature[] $product_features
 * @property-read int|null $product_features_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductPackageType[] $product_package_types
 * @property-read int|null $product_package_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductTranslation[] $translations
 * @property-read int|null $translations_count
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Return Image Url
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if(Storage::exists($this->image))
        {
            return Storage::url($this->image);
        }

        return 'https://picsum.photos/287/300';
    }

    /**
     * Translation of current product
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(ProductTranslation::class, 'product_id', 'id');
    }

    /**
     * All the features (From product_features) of current product
     *
     * @return HasMany
     */
    public function product_features(): HasMany
    {
        return $this->hasMany(ProductFeature::class, 'product_id', 'id');
    }

    /**
     * All the package types (From product_package_types) of current product
     *
     * @return HasMany
     */
    public function product_package_types(): HasMany
    {
        return $this->hasMany(ProductPackageType::class, 'product_id', 'id');
    }

    /**
     * Return belonged category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
