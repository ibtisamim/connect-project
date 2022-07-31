<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class AssignUserNotification extends Notification
{
    use Queueable;

    public $assigent_person;

    public $project_owner;

    public function __construct($project_owner,$assigent_person)
    {
        $this->assigent_person = $assigent_person;
        $this->project_owner = $project_owner;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
           "name_owner" => $this->project_owner,
           "assign_person" => $this->assigent_person,
        ];
    }
}
