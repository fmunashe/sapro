<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class, 'country_id', 'id');
    }

    public function hostFirms(): HasMany
    {
        return $this->hasMany(HostFirmConfig::class,'country_id','id');
    }

    public function offices(): HasMany
    {
        return $this->hasMany(Office::class);
    }
}
