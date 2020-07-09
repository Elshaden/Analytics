<?php

namespace Shaden\Analytics\Providers;


use Illuminate\Support\ServiceProvider;
use Shaden\Analytics\Events\AnalyticsEvent;
use Shaden\Analytics\Listeners\AnalyticsListener;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [

        AnalyticsEvent::class =>[
            AnalyticsListener::class,
        ],
    ];


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
