<?php

namespace App\Notifications;

use App\Mail\ExpenseAddedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpenseAddedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $expense;

    /**
     * @param $expense
     */
    public function __construct($expense)
    {
        $this->expense = $expense;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return ExpenseAddedMail
     */
    public function toMail($notifiable)
    {
        return (new ExpenseAddedMail($this->expense))
                ->to($notifiable->email);
    }

    public function toFirebase($notifiable)
    {
        //
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
            "amount" => number_format($this->expense->amount, 2),
            "type" => $this->expense->type->name
        ];
    }
}
