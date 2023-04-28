<?php

namespace App\Policies;

use App\Enums\UserTypeEnum;
use App\Models\ClientRequest;
use App\Models\User;

class ClientRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $user->type == UserTypeEnum::CLIENT);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ClientRequest $clientRequest): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $clientRequest->client_id == $user->id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ClientRequest $clientRequest): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $clientRequest->client_id == $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ClientRequest $clientRequest): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $clientRequest->client_id == $user->id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ClientRequest $clientRequest): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $clientRequest->client_id == $user->id);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ClientRequest $clientRequest): bool
    {
        return ($user->type == UserTypeEnum::ADMIN || $user->type == UserTypeEnum::SUPER_ADMIN || $clientRequest->client_id == $user->id);
    }
}
