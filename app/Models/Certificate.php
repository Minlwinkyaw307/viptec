<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Certificate
 *
 * @property int $id
 * @property string $image
 * @property int $order_no
 * @property int $visible
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereVisible($value)
 * @mixin \Eloquent
 */
class Certificate extends Model
{
    use HasFactory, SoftDeletes;

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

        return 'https://picsum.photos/670/1000';
    }
}
