<?php

namespace App\Listeners;

use App\Events\meetingCreated;
use App\Models\Student;
use App\Notifications\teacherAddedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyMeetingCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\meetingCreated  $event
     * @return void
     */
    public function handle(meetingCreated $event)
    {
        $students = Student::where('class_room_id', $event->classroom_id)->get();

        Notification::send($students, new teacherAddedNotification($event->meeting));
    }
}
