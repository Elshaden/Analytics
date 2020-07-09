<?php

namespace Shaden\Analytics\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AnalyticsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $addEvent;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($type = null,$model= null, $model_id=Null)
    {
        $ip = $this->getIp();
        $location = geoip()->getLocation($ip);
        $Event2Add =collect( [
            'type'=>$type ?? confic('analytics.default_type'),
            'model'=>$model ?? config('analytics.default_model')  ,
            'model_id'=>$model_id??Null,
            'geo_data'=>collect($location['attributes']),
            'user_id'=> auth()->user() ? auth()->user()->id: Null
        ]);
       $this->addEvent = $Event2Add;
      //  logger($this->addEvent)  ;
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

    /**
     * @return mixed|null
     */
    private function getIp()
    {

        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = null;

        return $ipaddress;
    }

}
