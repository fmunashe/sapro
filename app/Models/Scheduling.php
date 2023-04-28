<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scheduling extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'schedulingId';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'saproId', 'saproId');
    }
}
