<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationFeedback extends Notification
{
    use Queueable;

    private $reservation;
    /**
     * Create a new notification instance.
     */
    public function __construct($userEmail, $reservation)
    {
        $this->reservation = $reservation;
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
            ->line('Hi. You have successfully made a reservation for room '.$this->reservation->room->name.' for your staying from '.$this->reservation->arrival_date.' to '.$this->reservation->departure_date.'.')
            ->line('If you have any questions feel free to contact us at ultimate24208@gmail.com.');
    }

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
