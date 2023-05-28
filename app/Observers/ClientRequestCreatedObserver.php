<?php

namespace App\Observers;

use App\Models\ClientRequest;
use App\Models\User;
use App\Notifications\ClientRequestCreatedNotification;
use App\Notifications\GoogleChatNotification;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\GoogleChat\GoogleChatChannel;

class ClientRequestCreatedObserver
{
    /**
     * Handle the ClientRequest "created" event.
     */
    public function created(ClientRequest $clientRequest): void
    {
//        Notification::route(GoogleChatChannel::class,'')
//            ->notify(new GoogleChatNotification($clientRequest));
//        $superAdmins = User::query()->SuperAdmin()->get();
//        foreach ($superAdmins as $admin) {
////            $admin->notify(new ClientRequestCreatedNotification($clientRequest, $admin));
////            $admin->notify(new GoogleChatNotification($clientRequest,$admin));
//
//        }
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
