<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FAQTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $language_id
 * @property int $faq_id
 * @property string $question
 * @property string $answer
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FAQ $faq
 * @method static \Illuminate\Database\Query\Builder|FAQTranslation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation whereFaqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FAQTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|FAQTranslation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FAQTranslation withoutTrashed()
 */
class FAQTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'faq_translations';

    protected $fillable = ['question', 'answer', 'language_id'];

    protected $guarded = [];

    /**
     * Belonged FAQ Model
     *
     * @return BelongsTo
     */
    public function faq(): BelongsTo
    {
        return $this->belongsTo(FAQ::class, 'id', 'faq_id');
    }
}
