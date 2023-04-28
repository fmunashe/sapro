<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SeniorityLevel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'seniorityLevelId';

    public function factExternalClients(): HasMany
    {
        return $this->hasMany(FactExternalClient::class);
    }
}
