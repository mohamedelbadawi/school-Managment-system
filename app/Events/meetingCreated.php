<?php

namespace App\Events;

use App\Models\Meeting;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class meetingCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $meeting, $classroom_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Meeting $meeting, $classroom_id)
    {
        $this->meeting = $meeting;
        $this->classroom_id = $classroom_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
