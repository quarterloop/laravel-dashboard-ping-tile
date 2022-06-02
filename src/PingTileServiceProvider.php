<?php

namespace Quarterloop\PingTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Quarterloop\PingTile\Commands\FetchPingCommand;

class PingTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchPingCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-ping-tile'),
        ], 'dashboard-ping-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-ping-tile');

        Livewire::component('ping-tile', PingTileComponent::class);
    }
}
