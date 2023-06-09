<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificationsAndEducation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'certificationsAndEducationId';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'saproId', 'saproId');
    }

    public function qualificationCategory(): BelongsTo
    {
        return $this->belongsTo(QualificationCategory::class, 'qualification_category_id', 'id');
    }
}
