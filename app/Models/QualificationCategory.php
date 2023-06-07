<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function qualifications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CertificationsAndEducation::class, 'qualification_category_id', 'id');
    }
}
