<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\CertificateTranslation
 *
 * @property int $id
 * @property int $language_id
 * @property int $certificate_id
 * @property string $title
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation whereCertificateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CertificateTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Certificate $certificate
 */
class CertificateTranslation extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }
}
