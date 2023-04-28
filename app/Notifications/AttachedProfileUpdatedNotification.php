<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class AttachedProfileUpdatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $requestDetails;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, $requestDetails)
    {
        $this->user = $user;
        $this->requestDetails = $requestDetails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Attached Profile Updated')
            ->view('emails.attached_profile_updated', ['data' => $this->requestDetails, 'user' => $this->user]);
    }

//    public function via($notifiable)
//    {
//        return ['slack'];
//    }
//    public function toSlack($notifiable)
//    {
//        return (new SlackMessage)
//            ->content("Please note that ".$this->requestDetails->clientRequest->client->name. " has updated the request with the following description: .\n\n".$this->requestDetails->clientRequest->description);
//    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
