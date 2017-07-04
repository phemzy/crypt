<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Transaction;

class Matched extends Notification
{
    use Queueable;

    public $t;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Transaction $t)
    {
        //
        $this->t = $t;
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
                    ->line('Good News, ' . $this->t->user->fullname())
                    ->line('Your current transaction request to ' . $this->t->type . ' &#8358;' . number_format($this->t->package->amount, 2) . ' worth of ' . $this->t->market->abbr_name . ' on Crypto2Naira has been matched.')
                    ->line('Click the button below to view the transaction and carry out the necessary steps.')
                    ->action('Click here to check', route('transaction.single', $this->t->id))
                    ->line('Thank you for trading on our platform');
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