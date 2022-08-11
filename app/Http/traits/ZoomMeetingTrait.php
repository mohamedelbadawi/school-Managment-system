<?php

namespace App\Http\traits;

use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

trait ZoomMeetingTrait
{

    public function createMeeting(Request $request)
    {

        $user = Zoom::user()->first();
        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_time' => $request->start_time,
            'timezone' => 'Africa/Cairo',
        ];

        $meeting = Zoom::meeting()->make($meetingData);

        $meeting->settings()->make([
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
        ]);

      return  $user->meetings()->save($meeting);
    }
}
