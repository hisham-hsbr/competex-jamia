<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Competex\CourseRegistration;

class CourseRegisterUpdatesNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $courseRegister;
    /**
     * Create a new notification instance.
     */
    public function __construct(CourseRegistration $courseRegister)
    {
        $this->courseRegister = $courseRegister;
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
        return (new MailMessage)->view('back_end.competex.mail.course_register_updates', data: ['courseRegister' => $this->courseRegister]);
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
