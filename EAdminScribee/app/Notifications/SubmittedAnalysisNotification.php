<?php

namespace App\Notifications;

use App\RemunerationForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmittedAnalysisNotification extends Notification
{
    use Queueable;
    /**
     * @var RemunerationForm
     */
    private $remunerationForm;

    public function __construct(RemunerationForm $remunerationForm)
    {
        $this->remunerationForm = $remunerationForm;
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
                    ->line('The analysis of form has been submitted')
                    ->line('Decision: ' . $this->remunerationForm->status->name)
                    ->line('Comment: ' . $this->remunerationForm->comments()->latest()->first()->comment_text)
                    ->action('See Application', route('admin.remuneration-forms.show', $this->remunerationForm))
                    ->line('Thank you for using our application!');
    }
}
