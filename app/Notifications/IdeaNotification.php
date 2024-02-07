<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IdeaNotification extends Notification
{
    use Queueable;

    public $idea;
    /**
     * Create a new notification instance.
     */
    public function __construct($idea)
    {
        $this->idea = $idea;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'owner_id' => $this->idea['id'],
            'name' => $this->idea['name'],
            'owner' => $this->idea['owner'],
        ];
    }
}
