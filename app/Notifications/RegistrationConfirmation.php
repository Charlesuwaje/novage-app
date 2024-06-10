<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationConfirmation extends Notification
{
    use Queueable;
    private $registration;
    /**
     * Create a new notification instance.
     */
    public function __construct($registration)
    {
        $this->registration = $registration;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Registration Confirmation')
            ->greeting('Hello ' . $this->registration->name . ',')
            ->line('Thank you for registering!')
            ->line('Here are your registration details:')
            ->line('Name: ' . $this->registration->name)
            ->line('Phone Number: ' . $this->registration->phone_number)
            ->line('Email: ' . $this->registration->email)
            ->line('Best regards,')
            ->line('The Team');
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
