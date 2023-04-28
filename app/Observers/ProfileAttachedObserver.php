<?php

namespace App\Observers;

use App\Models\Profile;
use App\Models\User;
use App\Notifications\AttachedProfileUpdatedNotification;
use App\Notifications\ProfileAttachedNotification;

class ProfileAttachedObserver
{
    /**
     * Handle the Profile "created" event.
     */
    public function created(Profile $profile): void
    {
        $client = User::query()->where('id', '=', $profile->clientRequest->client_id)->first();
        $client->notify(new ProfileAttachedNotification($client, $profile));
    }

    /**
     * Handle the Profile "updated" event.
     */
    public function updated(Profile $profile): void
    {
        $superAdmins = User::query()->SuperAdmin()->get();
        foreach ($superAdmins as $admin) {
            $admin->notify(new AttachedProfileUpdatedNotification($admin, $profile));
        }
    }

    /**
     * Handle the Profile "deleted" event.
     */
    public function deleted(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "restored" event.
     */
    public function restored(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "force deleted" event.
     */
    public function forceDeleted(Profile $profile): void
    {
        //
    }
}
