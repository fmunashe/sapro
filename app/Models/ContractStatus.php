<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContractStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'contractStatusId';

    public function factExternalClients(): HasMany
    {
        return $this->hasMany(FactExternalClient::class);
    }
}
