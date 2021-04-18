<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\SliderTranslation
 *
 * @property int $id
 * @property int $slider_id
 * @property string $title
 * @property string $description
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Slider $slider
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation newQuery()
 * @method static \Illuminate\Database\Query\Builder|SliderTranslation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SliderTranslation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SliderTranslation withoutTrashed()
 * @mixin \Eloquent
 * @property int $language_id
 * @property string $btn_title
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereBtnTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SliderTranslation whereLanguageId($value)
 */
class SliderTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Belonged Slider Model
     *
     * @return BelongsTo
     */
    public function slider(): BelongsTo
    {
        return $this->belongsTo(Slider::class);
    }
}
