
# A short description of the tile

A friendly explanation of what your tile does.

This tile can be used on [the Laravel Dashboard](https://docs.spatie.be/laravel-dashboard).

## Installation

You can install the package via composer:

```bash
composer require quarterloop/laravel-dashboard-dns-tile
```

## Usage

In your dashboard view you use the `livewire:google-page-speed-tile` component.

```html
<x-dashboard>
    <livewire:google-page-speed-tile position="e7:e16" />
</x-dashboard>
```


Use the php artisan command to fetch Page Speed data.

``` bash
php artisan dashboard:fetch-google-page-speed-data
```

Use this snippet to schedule the command in app/Console/Commands/Kernel.php
``` bash
$schedule->command(\Quarterloop\DNSTile\Commands\FetchDNSCommand::class)->daily();
```

Also add the following code snippet in app/console/kernel.php under "$commands" in a new line:
``` bash
\Quarterloop\DNSTile\Commands\FetchDNSCommand::class,
```


Insert this in routes/web.php - this enables the manual-refresh-button in tile
``` bash
Route::get('/refresh-dns', function() {
  Artisan::call('dashboard:fetch-dns-data');
  return back();
})->name('fetch-dns');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email wallisch@skouz.de instead of using the issue tracker.

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
