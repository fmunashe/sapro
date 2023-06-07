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

    public function sectors(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Sector::class, 'sector_category_id', 'id');
    }

    public function clientRevenues(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ClientRevenue::class, 'sector_category_id', 'id');
    }
}
