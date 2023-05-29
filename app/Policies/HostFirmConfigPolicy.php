<?php

namespace App\Policies;

use App\Enums\UserTypeEnum;
use App\Models\HostFirmConfig;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HostFirmConfigPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostFirmConfig  $hostFirmConfig
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, HostFirmConfig $hostFirmConfig)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostFirmConfig  $hostFirmConfig
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, HostFirmConfig $hostFirmConfig)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostFirmConfig  $hostFirmConfig
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, HostFirmConfig $hostFirmConfig)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostFirmConfig  $hostFirmConfig
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, HostFirmConfig $hostFirmConfig)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostFirmConfig  $hostFirmConfig
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, HostFirmConfig $hostFirmConfig)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }
}
