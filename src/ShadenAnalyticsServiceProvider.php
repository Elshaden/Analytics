<?php

namespace Shaden\Analytics;

use Illuminate\Support\ServiceProvider;
use Shaden\Analytics\Providers\EventServiceProvider;
class ShadenAnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Analytics', function($app) {
            return new Analytics();
        });
        $this->app->register(EventServiceProvider::class);

        $this->mergeConfigFrom(__DIR__.'/Config/config.php', 'analytics');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/Config/config.php' => config_path('analytics.php'),
            ], 'config');
            if (! class_exists('CreateAnalyticsTable')) {
                $this->publishes([
                    __DIR__ . '/Database/migrations/create_shaden_analytics_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_shaden_analytics_table.php'),

                ], 'migrations');
            }
        }
    }
}
