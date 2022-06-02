<?php

namespace Quarterloop\PingTile;

use Livewire\Component;
use Illuminate\Support\DB;

class PingTileComponent extends Component
{

    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {

      $pingStore = PingStore::make();

        return view('dashboard-ping-tile::tile', [
            'website'         => config('dashboard.tiles.hosting.url'),
            'pings'           => $pingStore->getData()['data'],
            'lastUpdateTime'  => date('H:i:s', strtotime($pingStore->getLastUpdateTime())),
            'lastUpdateDate'  => date('d.m.Y', strtotime($pingStore->getLastUpdateDate())),
        ]);
    }
}
