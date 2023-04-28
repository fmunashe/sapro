<?php

namespace App\Policies;

use App\Enums\UserTypeEnum;
use App\Models\FirmExperience;
use App\Models\User;

class FirmExperiencePolicy
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
    public function view(User $user, FirmExperience $firmExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $firmExperience->saproId == $user->saproId);
    }
    /**
     * Determine whether the user can view the model.
     */
    public function approveFirmExperience(User $user, FirmExperience $firmExperience): bool
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
    public function update(User $user, FirmExperience $firmExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $firmExperience->saproId == $user->saproId);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FirmExperience $firmExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $firmExperience->saproId == $user->saproId);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FirmExperience $firmExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $firmExperience->saproId == $user->saproId);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FirmExperience $firmExperience): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $firmExperience->saproId == $user->saproId);
    }
}
