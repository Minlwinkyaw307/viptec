<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\ProductImage
 *
 * @property int $id
 * @property int $product_id
 * @property string $image
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $thumbnail
 * @property-read string $image_url
 * @property-read string $thumbnail_url
 * @method static \Illuminate\Database\Query\Builder|ProductImage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductImage whereThumbnail($value)
 * @method static \Illuminate\Database\Query\Builder|ProductImage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductImage withoutTrashed()
 */
class ProductImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['imageUrl', 'thumbnailUrl'];

    public CONST BASE_LOCATION = 'products';
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
     * Return Image Url
     *
     * @return string
     */
    public function getThumbnailUrlAttribute(): string
    {
        if(Storage::exists($this->thumbnail))
        {
            return Storage::url($this->thumbnail);
        }

        return 'https://picsum.photos/287/300';
    }
}
