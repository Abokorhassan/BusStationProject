<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Createschedule extends Notification
{
    use Queueable;

    public $user;
    public $schedule_number;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $schedule_number)
    {
        $this->user = $user;
        $this->schedule_number = $schedule_number;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'html_icon' =>   '<span class="circle_created animate_rtl">
                                <img  style="margin-top: 0.5rem; margin-left: 0.5rem;" src="https://img.icons8.com/color/26/000000/overtime.png">
                            </span>',
            'message' => 'created schedule',
            'data' => $this->schedule_number,
            'user_first_name' => $this->user->first_name,
            'user_last_name' => $this->user->last_name,
            'user_station' => $this->user->station_name,
            // 'createdTime' => Carbon::now()
        ];
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
