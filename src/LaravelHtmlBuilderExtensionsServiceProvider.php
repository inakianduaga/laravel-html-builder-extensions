<?php namespace InakiAnduaga\LaravelHtmlBuilderExtensionsServiceProvider;

use Illuminate\Support\ServiceProvider;
use Tado\Emails\Console\ProcessEmailMigrationCommand;
use Tado\Emails\Console\ProcessEmailQueueCommand;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class LaravelHtmlBuilderExtensionsServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $this -> package('inakianduaga/laravel-html-builder-extensions');
    }

    /**
     * Register the service provider - This runs before the boot() method
     *
     * @return void
     */
    public function register() {
    }

}
