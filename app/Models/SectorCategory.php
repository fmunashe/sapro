<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function industryCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IndustryCategory::class, 'industry_category_id');
    }
}
