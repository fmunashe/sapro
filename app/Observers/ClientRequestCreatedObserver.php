<?php

namespace App\Observers;

use App\Models\ClientRequest;
use App\Models\User;
use App\Notifications\ClientRequestCreatedNotification;

class ClientRequestCreatedObserver
{
    /**
     * Handle the ClientRequest "created" event.
     */
    public function created(ClientRequest $clientRequest): void
    {
        $superAdmins = User::query()->SuperAdmin()->get();
        foreach ($superAdmins as $admin) {
            $admin->notify(new ClientRequestCreatedNotification($clientRequest, $admin));
        }
    }

    /**
     * Handle the ClientRequest "updated" event.
     */
    public function updated(ClientRequest $clientRequest): void
    {
        //
    }

    /**
     * Handle the ClientRequest "deleted" event.
     */
    public function deleted(ClientRequest $clientRequest): void
    {
        //
    }

    /**
     * Handle the ClientRequest "restored" event.
     */
    public function restored(ClientRequest $clientRequest): void
    {
        //
    }

    /**
     * Handle the ClientRequest "force deleted" event.
     */
    public function forceDeleted(ClientRequest $clientRequest): void
    {
        //
    }
}
