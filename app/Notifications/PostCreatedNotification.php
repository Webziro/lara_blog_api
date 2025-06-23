<?php

namespace App\Notifications;

use App\Models\Post; // Import the Post model
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage; // For email formatting
use Illuminate\Notifications\Notification; // Base Notification class

class PostCreatedNotification extends Notification implements ShouldQueue // Added ShouldQueue for background processing
{
    use Queueable;

    public Post $post; // Public property to make the Post model available

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // We want to send this notification via email AND store it in the database
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // This is where you can define your email's content using MailMessage fluent methods.
        // Or, you can tell it to use a Mailable class (like our PostCreatedMail).
        // Let's use MailMessage directly for simplicity, but know you can pass a Mailable too.

        // You can also access $this->post here, as it's a public property.
        $postUrl = route('posts.show', $this->post->id);

        return (new MailMessage)
                    ->subject('New Post Published: ' . $this->post->title)
                    ->greeting('Hello ' . $notifiable->name . ',') // $notifiable is the user receiving the notification
                    ->line('A new post titled "' . $this->post->title . '" has been published by ' . ($this->post->user->name ?? 'Unknown Author') . '.')
                    ->action('View Post', $postUrl)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification for the database channel.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'post_id' => $this->post->id,
            'title' => $this->post->title,
            'author' => $this->post->user->name ?? 'Unknown Author',
            'url' => route('posts.show', $this->post->id),
            'message' => 'New post "' . $this->post->title . '" published by ' . ($this->post->user->name ?? 'Unknown Author') . '.',
        ];
    }

    /**
     * Get the array representation of the notification for the broadcast channel.
     *
     * @return array<string, mixed>
     */
    // public function toBroadcast(object $notifiable): array
    // {
    //     return [
    //         'message' => 'New post published!',
    //     ];
    // }
}