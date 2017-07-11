<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FailedTransaction extends Notification implements ShouldQueue
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
                    ->error()
                    ->line('Hello ' . $this->user->fullname() . ',')
                    ->line('Your matched transaction to purchase ' . $this->transaction->package->amount . ' naira worth of ' . $this->transaction->market->abbr_name . ' failed.')
                    ->line('Your account has been marked for investigation and may be blocked anytime from now.')
                    ->line('Kindly buy another package and complete your transaction to avoid this. You can login to your account by clicking the button below.')
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
