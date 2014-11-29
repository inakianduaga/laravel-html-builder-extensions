<?php namespace InakiAnduaga\LaravelHtmlBuilderExtensionsServiceProvider;

use Illuminate\Support\Facades\App;
use InakiAnduaga\LaravelHtmlBuilderExtensions\Html\HtmlBuilder;

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

        $this->package('inakianduaga/laravel-html-builder-extensions');
    }

    /**
     * Register the service provider - This runs before the boot() method
     *
     * @return void
     */
    public function register() {
        $this->registerHtmlBuilder();
    }

    /**
     * Register the HTML builder instance.
     * This binds the 'html' reference in the IoC container to the package implementation.
     * Laravel's HTML Facade will automatically use this when being called
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->bindShared('html', function($app)
        {
            return new app(HtmlBuilder::class);
        });
    }

}
