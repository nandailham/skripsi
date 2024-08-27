<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class ForDeveloper extends Notification
{
    use Queueable;

    public function __construct($data=null)
    {   /*
        https://github.com/laravel-notification-channels/telegram#text-notification

         contoh di controller Notification::send($users, new ForDeveloper());
        */

        // dd($data);
    }

   
    public function via(object $notifiable): array
    {
        return ['telegram'];
    }

   
    public function toTelegram(object $notifiable)
    {
        $chat_id = \Config::get('nxconfig.telegram_chat.default');
        // dd($chat_id);
        // $url = url('/invoice/coba');

        return TelegramMessage::create()
            // Optional recipient user id.
            ->to($chat_id)
            // Markdown supported.
            ->content("Hello there!")
            ->line("Your invoice has been *PAID*")
            ->line("Thank you!");

            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])

            // (Optional) Inline Buttons
            // ->button('View Invoice', $url)

            // (Optional) Inline Button with callback. You can handle callback in your bot instance
            // ->buttonWithCallback('Confirm', 'confirm_invoice IDnya' );
    
        
    }

  
}
