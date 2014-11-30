laravel-html-builder-extensions
===============================

Extendes Laravel Html builder functionality, providing configuration-based automatic external url redirection to serve assets from CDNs

# Installation

### Add package as a composer dependency

In your `composer.json` file, include

```json
"require": {
        "inakianduaga/laravel-html-builder-extensions" : "dev-master",
    },
```

and then run

`composer update --no-scripts inakianduaga/laravel-html-builder-extensions`

to install the package

### Register package in the laravel application

After you've updated your composer packages, in `app.php` replace the native Laravel Html builder service provider by
the one in this package:

```php

array(
    ...
    'providers' => array(
       ...
    // 'Illuminate\Html\HtmlServiceProvider', //remove this line
       'InakiAnduaga\LaravelHtmlBuilderExtensions\LaravelHtmlBuilderExtensionsServiceProvider', //add this one
    )
)
```


### Publish package configuration

In the laravel installation root folder, run

`php artisan config:publis inakianduaga/laravel-html-builder-extensions`

You can then modify the example values in the file `app/config/packages/inakianduaga/laravel-html-builder-extensions/config.php`

** Configure Assets Redirection (CDNs) **

- Script, styles and images can be redirected through an external url individually, see configuration
- Image redirection is enabled by file extension, so you can skip redirecting certain images


** Configure Image lazy loading **

@TODO

# Usage:

Usage is the same as the native laravel HTML builder, for example

```php
{{ HTML::image('src', 'alt', options) }}
{{ HTML::styles('src') }}
{{ HTML::scripts('src') }}
```

