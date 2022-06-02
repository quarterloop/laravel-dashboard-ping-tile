<?php

namespace Quarterloop\PingTile\Services;

use Illuminate\Support\Facades\Http;

class PingAPI
{
  public static function getPing(string $url, string $key): array
  {

      $response = Http::withHeaders([
        'x-api-key' => $key,
      ])->post('https://api.geekflare.com/ping', [
        'url' => $url,
        'locations' => [ "uk", "us", "sg" ],
      ])->json();

      return $response;
  }
}
