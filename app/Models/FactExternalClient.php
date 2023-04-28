<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class FactExternalClient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'externalClientId';

    public function setSaproContractStartDateAttribute($value)
    {
        $this->attributes['saproContractStartDate'] = (new Carbon($value))->format('Y-m-d');
    }

    public function setSaproContractEndDateAttribute($value)
    {
        $this->attributes['saproContractEndDate'] = (new Carbon($value))->format('Y-m-d');
    }

    public function getSaproContractStartDateAttribute($value): string
    {
        return (new Carbon($value))->format('Y-m-d');
    }

    public function getSaproContractEndDateAttribute($value): string
    {
        return (new Carbon($value))->format('Y-m-d');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'saproId', 'saproId');
    }

    public function seniorityLevels(): BelongsTo
    {
        return $this->belongsTo(SeniorityLevel::class, 'seniorityLevelId');
    }

    public function contractStatus(): BelongsTo
    {
        return $this->belongsTo(ContractStatus::class, 'contractStatusId');
    }

    public function specialisation(): BelongsTo
    {
        return $this->belongsTo(Specialisation::class, 'specialisationId');
    }
}
