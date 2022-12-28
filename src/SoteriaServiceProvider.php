<?php

namespace i616\Soteria;

use i616\Soteria\Commands\SoteriaCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SoteriaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('soteria')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_soteria_table')
            //->hasCommand(SoteriaCommand::class)
            ->hasRoutes(['web', 'api'])
            ->hasRoutes();
    }
}
