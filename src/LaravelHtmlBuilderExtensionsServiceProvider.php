<?php namespace InakiAnduaga\LaravelHtmlBuilderExtensions;

use InakiAnduaga\LaravelHtmlBuilderExtensions\Html\HtmlBuilder;
use InakiAnduaga\LaravelHtmlBuilderExtensions\Url\UrlGenerator;

use Illuminate\Support\Facades\App;
use Illuminate\Html\HtmlServiceProvider;

class LaravelHtmlBuilderExtensionsServiceProvider extends HtmlServiceProvider {

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        //https://coderwall.com/p/svocrg/configurations-and-namespaces-in-package-development-for-laravel
        //https://github.com/laravel/framework/issues/3505
        $this->package('inakianduaga/laravel-html-builder-extensions');

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
            $urlGenerator = App::make(UrlGenerator::class);

            return new HtmlBuilder($urlGenerator);
        });
    }

}
