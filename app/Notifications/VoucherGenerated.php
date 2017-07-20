<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VoucherGenerated extends Notification implements ShouldQueue
{
    protected $user, $voucher;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $voucher)
    {
        $this->user = $user;
        $this->voucher = $voucher;
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
                    ->from('flashsales@crypto2naira.com', 'Accounts')
                    ->line($this->user->fullname())
                    ->line('Your request to convert your transaction to voucher is successful.')
                    ->line('Here is your generated voucher: <b> ' . $this->voucher->name . ' </b>.')
                    ->line('Kindly place an order with this voucher or come with it for the flash sales and it shall be applied for you.')
                    ->line('Remember, this voucher is <b>only valid for a single usage </b>. So keep it safe from any third party so it won\'t be used without your knowledge. ')
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
