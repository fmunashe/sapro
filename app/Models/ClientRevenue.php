<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientRevenue extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'clientRevenueId';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'saproId', 'saproId');
    }

    public function auditedWork(): hasMany
    {
        return $this->hasMany(AuditedWork::class, 'revenueId', 'clientRevenueId');
    }
}
