<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sectorCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SectorCategory::class, 'industry_category_id');
    }
}
