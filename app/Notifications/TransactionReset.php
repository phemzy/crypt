<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TransactionReset extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $transaction;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $transaction)
    {
        $this->user = $user;
        $this->transaction = $transaction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Hello, ' . $this->user->fullname())
                    ->line('The status of your matched transaction to sell ' . $this->transaction->package->amount . ' naira worth of ' . $this->transaction->market->abbr_name . ' has been reset to pending since the matched user has refused to pay.')
                    ->line('You don\'t have to do anything. You will be automatically rematched with another buyer as soon as possible.')
                    ->line('Kindly spread the word about crypto2naira.com for the community to be larger and for faster transactions.')
                    ->line('You can click the button below to login to your account')
                    ->action('Login', url('/login'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
