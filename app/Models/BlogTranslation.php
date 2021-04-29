<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlogTranslation
 *
 * @property int $id
 * @property int $language_id
 * @property int $blog_id
 * @property string $title
 * @property string $content
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|BlogTranslation whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|BlogTranslation onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlogTranslation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlogTranslation withoutTrashed()
 */
class BlogTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
}
