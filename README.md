laravel-html-builder-extensions
===============================

Extendes Laravel Html builder functionality

# Installation

## Add as dependency

In your `composer.json` file, include

```json
"require": {
        "inakianduaga/laravel-html-builder-extensions" : "dev-master",
        ...
    },
```
## Register Package

After you've updated your composer packages, in `app.php`, replace the native Laravel Html builder service provider by
this packages:

```php

array(
    ...
    'providers' => array(
       ...
    // 'Illuminate\Html\HtmlServiceProvider', //remove this line
       'InakiAnduaga\LaravelHtmlBuilderExtensions',
    )
)
```

## Publish configuration

In the laravel installation root folder, run
`php artisan config:publis inakianduaga/laravel-html-builder-extensions --path vendor/inakianduaga/laravel-html-builder-extensions/src/Config`

You can then modify the initial values in `app/config/packages/inakianduaga/laravel-html-builder-extensions/config.php`

# AWS Cloufront asset redirection

Configure an endpoint to redirect all script/styles/images through it


# Image lazy loading

TODO