<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeSuperAdmin(Builder $query)
    {
        $query->where('type', '=', UserTypeEnum::SUPER_ADMIN);
    }

    public function routeNotificationForSlack($notification)
    {
        return Config('slack.SLACK_WEBHOOK_URL');
    }

    public function scopeClients(Builder $query)
    {
        $query->where('type', '=', UserTypeEnum::CLIENT);
    }

    public function scopeAuditors(Builder $query)
    {
        $query->where('type', '=', UserTypeEnum::USER);
    }

    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class, 'saproId', 'saproId');
    }

    public function additionalExperiences(): HasMany
    {
        return $this->hasMany(AdditionalExperience::class, 'saproId', 'saproId');
    }

    public function certificationsAndEducation(): HasMany
    {
        return $this->hasMany(CertificationsAndEducation::class, 'saproId', 'saproId');
    }

    public function clientRevenues(): HasMany
    {
        return $this->hasMany(ClientRevenue::class, 'saproId', 'saproId');
    }

    public function firmExperiences(): HasMany
    {
        return $this->hasMany(FirmExperience::class, 'saproId', 'saproId');
    }

    public function firstTimeAuditClients(): HasMany
    {
        return $this->hasMany(FirstTimeAuditClient::class, 'saproId', 'saproId');
    }

    public function industries(): HasMany
    {
        return $this->hasMany(Industry::class, 'saproId', 'saproId');
    }

    public function internationalExperiences(): HasMany
    {
        return $this->hasMany(InternationalExperience::class, 'saproId', 'saproId');
    }

    public function listedClients(): HasMany
    {
        return $this->hasMany(ListedClient::class, 'saproId', 'saproId');
    }

    public function professionalExperience(): HasMany
    {
        return $this->hasMany(ProfessionalExperience::class, 'saproId', 'saproId');
    }

    public function scheduling(): HasMany
    {
        return $this->hasMany(Scheduling::class, 'saproId', 'saproId');
    }

    public function sectors(): HasMany
    {
        return $this->hasMany(Sector::class, 'saproId', 'saproId');
    }

    public function softwareExperiences(): HasMany
    {
        return $this->hasMany(SoftwareExperience::class, 'saproId', 'saproId');
    }

    public function factExternalClients(): HasMany
    {
        return $this->hasMany(FactExternalClient::class, 'saproId', 'saproId');
    }

    public function seniorityLevel(): BelongsTo
    {
        return $this->belongsTo(SeniorityLevel::class, 'seniorityLevelId');
    }

    public function specialisation(): BelongsTo
    {
        return $this->belongsTo(Specialisation::class, 'specialisationId');
    }

    public function contractStatus(): BelongsTo
    {
        return $this->belongsTo(ContractStatus::class, 'contractStatusId');
    }

    public function hostFirms(): HasMany
    {
        return $this->hasMany(HostFirm::class, 'saproId', 'saproId');
    }

    public function clientRequests(): HasMany
    {
        return $this->hasMany(ClientRequest::class, 'client_id', 'id');
    }
}
