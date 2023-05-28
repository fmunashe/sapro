<?php

namespace App\Notifications;

use App\Models\ClientRequest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\GoogleChat\Card;
use NotificationChannels\GoogleChat\Components\Button\TextButton;
use NotificationChannels\GoogleChat\Enums\Icon;
use NotificationChannels\GoogleChat\Enums\ImageStyle;
use NotificationChannels\GoogleChat\GoogleChatChannel;
use NotificationChannels\GoogleChat\GoogleChatMessage;
use NotificationChannels\GoogleChat\Section;
use NotificationChannels\GoogleChat\Widgets\Buttons;
use NotificationChannels\GoogleChat\Widgets\KeyValue;

class GoogleChatNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $requestDetails;

    /**
     * Create a new notification instance.
     */
    public function __construct(ClientRequest $clientRequest)
    {
        $this->requestDetails = $clientRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
//        return ['mail'];
        return [
            GoogleChatChannel::class
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toGoogleChat($notifiable)
    {
        $content ='<p>Name: '.$this->requestDetails->client->name.'</p><br>';
        $content.='<p> Surname: '.$this->requestDetails->client->surname.'</p><br>';
        $content.='<p> Client ID: '.$this->requestDetails->client->id.'</p><br>';
        $content.='<p> Sapro ID: '.$this->requestDetails->client->saproId.'</p><br>';

//        return GoogleChatMessage::create()
//        ->bold('Good day '.$this->user->name.' '.$this->user->surname)
//        ->line('This serves to notify you that client '.$this->requestDetails->client->name. ' has opened a request with below details :')
//        ->monospaceBlock($this->requestDetails->description)
//        ->link('https://status.example.com/logs', 'Check Out the Logs.');
        return GoogleChatMessage::create()
//            ->bold('Good day '.$this->user->name.' '.$this->user->surname)
            ->card(
                Card::create()
                    ->header(
                        'Palladium Order Failed ',
                        'Order Number: ',
                        'https://cdn.example.com/avatars/user.png',
                        ImageStyle::CIRCULAR
                    )
                    ->section(
                        section::create(
                            KeyValue::create(
                                'Order Details',
                                '<u>Order Description :</u>'.
                                '<br> Rebel Safety Boots : R 1,840.00'.
                                '<br> Orange Rainsuits : R 340.00'.
                                '<br> Helmets : R 110.00'.
                                '<br> Status :Failed',
                                ''
                            )
                        )
                    )
                    ->section(
                        Section::create(
                            KeyValue::create(
                                'Client Details',
                                $content,
                                ''
                            )
//                                ->icon(Icon::SHOPPING_CART)
//                                ->onClick(route('users.index'))
                        )
                    )
                    ->section(
                        Section::create(
                            Buttons::create(
                                TextButton::create(route('users.index'), 'Process Now')
                            )
                        )
                    )
            );

    }
}
