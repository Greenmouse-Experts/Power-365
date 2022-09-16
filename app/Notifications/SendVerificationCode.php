<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendVerificationCode extends Notification
{
    use Queueable;
    private $new_user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $new_user)
    {
        $this->new_user = $new_user;
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
                    ->subject('Verify Email Address')
                    ->line('Hello, '. $this->new_user->last_name)
                    ->line('Thank you for signing up with '. config('app.name'). '! Before you get started we need you to confirm your email
                            address. Please enter the 6-digit code to
                            verify your profile.')
                    ->line('Your verification code is: ' . $this->new_user->code)
                    ->line('The allowed duration of the code is two hours from the time the message was sent.')
                    ->line('If you have any questions, please visit our FAQ page or contact us.')
                    ->line('Best Regards,')
                    ->line('The '.config('app.name').' Team!');
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
