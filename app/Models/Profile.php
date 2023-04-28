<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clientRequest(): BelongsTo
    {
        return $this->belongsTo(ClientRequest::class, 'client_request_id', 'id');
    }

    public function auditor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
