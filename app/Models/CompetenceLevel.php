<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenceLevel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function seniorityLevel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SeniorityLevel::class,'seniorityLevelId');
    }
}
