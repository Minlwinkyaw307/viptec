<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
 */
class ProductPackageType extends Model
{
    use HasFactory, SoftDeletes;
}
