<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AccidentRemoved extends Notification
{
    use Queueable;

    public $user;
    public $bus_number;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $bus_number)
    {
        $this->user = $user;
        $this->bus_number = $bus_number;
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
            'html_icon' =>  '<span class="circle_Deleted animate_rtl">
                                <img  style="margin-top: 0.7rem; margin-left: 0.7rem;" style="margin-top: -2%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds/Ukn0/xeOV/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv/GRLOZ75VdD1o0Reo9thz/ovA0nn3HMJRhVR5a/JM6FRmAFc/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC/wiSOza04k/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D/yDYBrZAOezapDEB2a1y8I/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==">
                            </span>',
            'message' => 'remove accident',
            'data' => $this->bus_number,
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
