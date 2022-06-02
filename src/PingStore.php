<?php

namespace Quarterloop\PingTile;

use Spatie\Dashboard\Models\Tile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PingStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("ping");
    }

    public function setData(array $data): self
    {
        $this->tile->putData('ping', $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData('ping') ?? [];
    }

    public function getLastUpdateTime()
    {
        $tileName = 'ping';

        $queryTime = DB::table('dashboard_tiles')->select('updated_at')->where('name', '=', $tileName)->get();

        $responseTime = Str::substr($queryTime, 26, 9);

        return $responseTime;
    }

    public function getLastUpdateDate()
    {
        $tileName = 'ping';

        $queryDate = DB::table('dashboard_tiles')->select('updated_at')->where('name', '=', $tileName)->get();

        $responseDate = Str::substr($queryDate, 16, 10);

        return $responseDate;
    }
}
