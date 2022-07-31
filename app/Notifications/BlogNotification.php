<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BlogNotification extends Notification
{
    use Queueable;
    private $blogData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($blogData)
    {
        $this->blogData = $blogData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database']; //'mail',
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

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
            'post_id'       => $this->blogData['post_id'] ,
            'post_title' => $this->blogData['post_title_id'] ,
            'url'           => $this->blogData['url'] ,
            'body'          => 'There is new post in our blog',
            'title'         => 'Blog notifications',
        ];
    }
}
