<?php

namespace Shaden\Analytics\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Shaden\Analytics\Models\Analytic;

class AnalyticsListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $item = $event->addEvent;
        logger($item)  ;
       Analytic::create($item->toArray());
        $item = Null;
        $event->addEvent = Null;

    }
}
