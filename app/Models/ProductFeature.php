<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProductFeature
 *
 * @property int $id
 * @property int $product_id
 * @property int $feature_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductFeature onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereFeatureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFeature whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ProductFeature withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductFeature withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\Feature $feature
 * @property-read \App\Models\Product $product
 */
class ProductFeature extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

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
     * Belonged Feature
     *
     * @return BelongsTo
     */
    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
}
