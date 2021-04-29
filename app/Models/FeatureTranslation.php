<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FeatureTranslation
 *
 * @property int $id
 * @property int $language_id
 * @property int $feature_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation newQuery()
 * @method static \Illuminate\Database\Query\Builder|FeatureTranslation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation whereFeatureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeatureTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|FeatureTranslation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FeatureTranslation withoutTrashed()
 * @mixin \Eloquent
 */
class FeatureTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
}
