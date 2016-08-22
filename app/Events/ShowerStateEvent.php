<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShowerStateEvent extends Event implements ShouldBroadcast
{

    use SerializesModels;

    /**
     * @var
     */
    public $koten_id;

    /**
     * ShowerStateEvent constructor.
     * @param $koten_id
     */
    public function __construct($koten_id)
    {
        $this->koten_id = $koten_id;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['shower-channel'];
    }
}
