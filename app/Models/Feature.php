<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * App\Models\Feature
 *
 * @property int $id
 * @property int $visible
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newQuery()
 * @method static \Illuminate\Database\Query\Builder|Feature onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereVisible($value)
 * @method static \Illuminate\Database\Query\Builder|Feature withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Feature withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductFeature[] $product_features
 * @property-read int|null $product_features_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FeatureTranslation[] $translations
 * @property-read int|null $translations_count
 */
class Feature extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * All the products (From product_features) of current feature
     *
     * @return HasMany
     */
    public function product_features(): HasMany
    {
        return $this->hasMany(ProductFeature::class, 'feature_id', 'id');
    }

    /**
     * All the translation of Feature
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(FeatureTranslation::class, 'feature_id', 'id');
    }

    /**
     * @param bool $isFilter
     * @return array
     */
    public static function feature_options($isFilter=false): array
    {
        $result = [];
        if($isFilter) {
            $result = ['0' => __("All Options")];
        }
        $features = Feature::select(['id', 'deleted_at'])->with(['translations' => function($query) {
            get_current_translation($query);
            $query->select(['id', 'language_id', 'feature_id', 'name']);
        }])->withTrashed()->get()->mapWithKeys(function($package) {
            return [$package->id => $package->translations[0]->name];
        });

        return collect($result)->union($features)->toArray();
    }
}
