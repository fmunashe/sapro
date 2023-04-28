<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditedWork extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clientRevenues(): BelongsTo
    {
        return $this->belongsTo(ClientRevenue::class, 'client_revenue_clientRevenueId', 'clientRevenueId');
    }
}
