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
 * @property string $image
 * @property-read \App\Models\Category $category
 * @property-read string $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductCompatible[] $product_compatibles
 * @property-read int|null $product_compatibles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductImage[] $product_images
 * @property-read int|null $product_images_count
 * @property-read mixed $some_date
 * @property-read array $status
 * @method static \Illuminate\Database\Eloquent\Builder|Product productFilter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Product statusFilter($filter)
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['imageUrl', 'status'];

    protected $casts = [
        'visible' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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
        return $this->hasMany(ProductPackageType::class);
    }

    /**
     * All the compatible Blade
     *
     * @return HasMany
     */
    public function product_compatibles(): HasMany
    {
        return $this->hasMany(ProductCompatible::class, 'product_id', 'id');
    }

    /**
     * Return all the image that belongs to current product
     *
     * @return HasMany
     */
    public function product_images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
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

    /**
     * Return all the statuses of product
     *
     * @return array
     */
    public static function product_statues(): array
    {
        return [
            '0' => __('All Options'),
            '1' => __('Hidden'),
            '2' => __("Active"),
        ];
    }


    // Scopes

    public function scopeProductFilter($query, $filter) {
        return $query->whereHas('translations', function($query) use ($filter) {
            $query->where('title', 'like', "%$filter%");
        });
    }

    public function scopeStatusFilter($query, $filter) {
        if($filter == 1)
        {
            return $query->where('visible', false);
        }else
        {
            return $query->where('visible', true);
        }
    }

    public function deleteOldImage()
    {
        if(Storage::exists($this->image)) {
            Storage::delete($this->image);
        }
    }

    public static function product_options($isFilter=false, $category_ids=[]): array
    {
        $result = [];
        if($isFilter) {
            $result = ['0' => __("All Options")];
        }
        $products = Product::query()
            ->select(['id', 'deleted_at'])->with(['translations' => function($query) {
            get_current_translation($query);
            $query->select(['id', 'language_id', 'product_id', 'title']);
        }]);
        if($category_ids) {
            $products->whereIn('category_id', $category_ids);
        }

        $products = $products->withTrashed()->get()->mapWithKeys(function($package) {
            return [$package->id => $package->translations[0]->title];
        });


        return collect($result)->union($products)->toArray();
    }

}
