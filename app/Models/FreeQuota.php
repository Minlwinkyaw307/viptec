<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FreeQuota
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $phone
 * @property int $product_id
 * @property int $piece
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota newQuery()
 * @method static \Illuminate\Database\Query\Builder|FreeQuota onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota query()
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota wherePiece($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FreeQuota whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|FreeQuota withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FreeQuota withoutTrashed()
 * @mixin \Eloquent
 */
class FreeQuota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'product_id',
        'piece',
        'message'
    ];

    /**
     * Belonged Product Info
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
