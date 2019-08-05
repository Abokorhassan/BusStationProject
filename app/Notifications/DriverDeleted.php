<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DriverDeleted extends Notification
{
    use Queueable;

    public $user;
    public $driver_number;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $driver_number)
    {
        $this->user = $user;
        $this->driver_number = $driver_number;
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
            'html_icon' =>   '<span class="circle_Deleted animate_rtl">
                                <img style="margin-top: 0.6rem; margin-left: 0.7rem;"  src="https://img.icons8.com/color/25/000000/driver.png">
                            </span>',
            'message' => 'removed driver',
            'data' => $this->driver_number,
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
