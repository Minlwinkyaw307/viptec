<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProductCompatible
 *
 * @property int $id
 * @property int $product_id
 * @property int $blade_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $blade
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCompatible newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCompatible newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductCompatible onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCompatible query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCompatible whereBladeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCompatible whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCompatible whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCompatible whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCompatible whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCompatible whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ProductCompatible withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductCompatible withoutTrashed()
 * @mixin \Eloquent
 */
class ProductCompatible extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Return Product Information
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Return Blade Information
     *
     * @return BelongsTo
     */
    public function blade(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'blade_id', 'id');
    }
}
