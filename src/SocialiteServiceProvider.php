<?php

namespace LaravelBoilerplates\Socialite;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SocialiteServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('socialite')
            ->hasConfigFile()
            ->hasRoute('auth')
            ->hasMigration('add_provider_to_users_table')
            ->hasViews()
            ->hasViewComponent('socialite', "LaravelBoilerplates\Socialite\Components\LoginButtons")
            ->hasViewComponent('socialite', "LaravelBoilerplates\Socialite\Components\RegisterButtons");
    }
}
