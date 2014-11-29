<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Amazon Cloudfront Configuration
    |--------------------------------------------------------------------------
    |
    | Whether to redirect asset/styles/images urls through an external url
    |
    | Images: Image types can be specified, so we can choose to redirect some and not others
    */

    'redirector' => array(
        'images' => array(
            'enabled'      => true,
            'endpoint'     => 'd324tgzfocpwne.cloudfront.net',
            'allowedTypes' => array(
                'jpg',
                'png',
                'gif',
                'pdf',
                'mp4',
                'webm',
                'svg',
                //Fonts (enable x-domain headers for these to work)
                'eot',
                'woff',
                'ttf',
                'svg',
            ),
        ),
        'styles' => array(
            'enabled'  => true,
            'endpoint' => 'd324tgzfocpwne.cloudfront.net',
        ),
        'scripts'     => array(
            'enabled'  => true,
            'endpoint' => 'd324tgzfocpwne.cloudfront.net',
        ),
    ),
    /*
    |--------------------------------------------------------------------------
    | Image Lazy Loading
    |--------------------------------------------------------------------------
    |
    | Whether we want to load the images lazy or not
    |
    */

    'lazyLoad'   => array(
        'enabled'           => true,
        'class'             => 'lazy',
        'dataAttribute'     => 'source',
        'placeholder_image' => '/img/transparent.gif',
        //1x1 pixel image
        'timeoutTriggerAll' => 4000,
        //this is either false or a number (in ms) that we wait to trigger and load all images
        'threshold'         => 600,
        //make the images preload when they are within this many pixels below the active viewport
    ),


);

