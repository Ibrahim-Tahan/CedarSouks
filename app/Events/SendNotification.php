<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $channel;
    public $event;
    public $type;
    public function __construct($message,$channel,$event,$type)
    {
        $this->message = $message;
        $this->channel = $channel;
        $this->event = $event;
        $this->type = $type;
    }
  
    public function broadcastOn()
    {
        return [$this->channel];
    }
  
    public function broadcastAs()
    {
        return $this->event;
    }
}
