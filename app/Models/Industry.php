<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Industry extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'industryId';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'saproId', 'saproId');
    }

    public function industryCategory(): BelongsTo
    {
        return $this->belongsTo(IndustryCategory::class);
    }
}
