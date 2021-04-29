<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\PackageTypeTranslation
 *
 * @property int $id
 * @property int $language_id
 * @property int $package_type_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation newQuery()
 * @method static \Illuminate\Database\Query\Builder|PackageTypeTranslation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation wherePackageTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageTypeTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PackageTypeTranslation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PackageTypeTranslation withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\PackageType $package_type
 */
class PackageTypeTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function package_type(): BelongsTo
    {
        return $this->belongsTo(PackageType::class);
    }
}
