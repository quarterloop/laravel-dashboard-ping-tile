<?php

namespace Quarterloop\PingTile\Commands;

use Illuminate\Console\Command;
use Quarterloop\PingTile\Services\PingAPI;
use Quarterloop\PingTile\PingStore;
use Session;

class FetchPingCommand extends Command
{
    protected $signature = 'dashboard:fetch-ping-data';

    protected $description = 'Fetch ping data';

    public function handle(PingAPI $ping_api)
    {

        $this->info('Fetching ping data ...');

        $ping = $ping_api::getPing(
            Session::get('website'),
            config('dashboard.tiles.geekflare.key'),
        );

        PingStore::make()->setData($ping);

        $this->info('Stored data ...');

        $this->info('All done!');
    }
}
