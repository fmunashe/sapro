<?php

namespace App\Policies;

use App\Enums\UserTypeEnum;
use App\Models\ProfessionalExperience;
use App\Models\User;

class ProfessionalExperiencePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $user->type == UserTypeEnum::USER);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProfessionalExperience $professionalExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $professionalExperience->saproId == $user->saproId);
    }

    public function approveProfessionalExperience(User $user, ProfessionalExperience $firmExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $user->type == UserTypeEnum::USER);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProfessionalExperience $professionalExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $user->saproId == $professionalExperience->saproId);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProfessionalExperience $professionalExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $professionalExperience->saproId == auth()->user()->saproId);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProfessionalExperience $professionalExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $professionalExperience->saproId == auth()->user()->saproId);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProfessionalExperience $professionalExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $professionalExperience->saproId == auth()->user()->saproId);
    }
}
