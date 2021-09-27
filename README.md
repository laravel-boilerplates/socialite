# A boilerplate for the SocialiteProviders\Manager package with auth scaffolding.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravel-boilerplates/socialite.svg?style=flat-square)](https://packagist.org/packages/laravel-boilerplates/socialite)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/laravel-boilerplates/socialite/run-tests?label=tests)](https://github.com/laravel-boilerplates/socialite/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/laravel-boilerplates/socialite/Check%20&%20fix%20styling?label=code%20style)](https://github.com/laravel-boilerplates/socialite/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-boilerplates/socialite.svg?style=flat-square)](https://packagist.org/packages/laravel-boilerplates/socialite)

This package provides auth boilerplate for the SocialiteProviders\Manager package. 

## Installation

You can install the package via composer:

```bash
composer require laravel-boilerplates/socialite
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="LaravelBoilerplates\Socialite\SocialiteServiceProvider" --tag="socialite-migrations"
php artisan migrate
```

## Configuration
You can publish the config file with:
```bash
php artisan vendor:publish --provider="LaravelBoilerplates\Socialite\SocialiteServiceProvider" --tag="socialite-config"
```

This is the contents of the published config file:

```php
return [
    'storeTokens'      => env('SOCIALITE_STORE_TOKENS', true),
];
```

Typical configuration of Socialite still applies. `config/services.php`

```php
'microsoft' => [    
  'client_id' => env('MICROSOFT_CLIENT_ID'),  
  'client_secret' => env('MICROSOFT_CLIENT_SECRET'),  
  'redirect' => env('MICROSOFT_REDIRECT_URI') 
],
```

## Usage

```php
use Laravel\Socialite\Facades\Socialite;

return Socialite::driver('microsoft')->redirect();
```

The following routes are published:
```php
Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/auth/{provider}/redirect', [SocialSessionController::class, 'create'])->name('social.login');
    Route::get('/auth/{provider}/callback', [SocialSessionController::class, 'store']);

    Route::get('/register/{provider}', [RegisteredSocialUserController::class, 'index'])->name('social.register.approve');
    Route::get('/register/{provider}/redirect', [RegisteredSocialUserController::class, 'create'])->name('social.register');
    Route::get('/register/{provider}/callback', [RegisteredSocialUserController::class, 'store']);
});
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Daniel Wiser](https://github.com/laravel-boilerplates)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
