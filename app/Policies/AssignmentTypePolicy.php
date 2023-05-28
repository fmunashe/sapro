<?php

namespace App\Policies;

use App\Enums\UserTypeEnum;
use App\Models\AssignmentType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentTypePolicy
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
     * @param  \App\Models\AssignmentType  $assignmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AssignmentType $assignmentType)
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
     * @param  \App\Models\AssignmentType  $assignmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AssignmentType $assignmentType)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssignmentType  $assignmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AssignmentType $assignmentType)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssignmentType  $assignmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AssignmentType $assignmentType)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssignmentType  $assignmentType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AssignmentType $assignmentType)
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }
}
