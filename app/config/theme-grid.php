<?php
/**
 * Config-file for Anax, theme related settings, return it all as array.
 *
 */
return [

    /**
     * Settings for Which theme to use, theme directory is found by path and name.
     *
     * path: where is the base path to the theme directory, end with a slash.
     * name: name of the theme is mapped to a directory right below the path.
     */
    'settings' => [
        'path' => ANAX_INSTALL_PATH . 'theme/',
        'name' => 'caligula-grid',
    ],

    
    /**
     * Add default views.
     */
    'views' => [

        ['region' => 'navbar',
         'template' => [
                'callback' => function() {
                    return $this->di->navbar->create();
                },],
        'data' => [],
        'sort' => -1
        ],

        ['region' => 'header', 'template' => 'grid/header', 'data' => [
            'siteTitle' => 'Caligula',
            'siteTagline' => 'Made with MVC!',
        ], 'sort' => -1],

        ['region' => 'footer', 'template' => 'grid/footer', 'data' => [], 'sort' => -1],
    ],


    /**
     * Data to extract and send as variables to the main template file.
     */
    'data' => [

        // Language for this page.
        'lang' => 'sv',

        'baseurl' => ANAX_BASE_PATH,

        // Append this value to each <title>
        'title_append' => ' | Caligula a web template',

        // Stylesheets
        'stylesheets' => ['css/caligula_css/stylesheets/theme_style.css'],

        // Inline style
        'style' => null,

        'showRegions' => null,

        // Favicon
        'favicon' => 'favicon.ico',

        // Path to modernizr or null to disable
        'modernizr' => 'js/modernizr.js',

        // Path to jquery or null to disable
        'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js',

        // Array with javscript-files to include
        'javascript_include' => ['js/base.js'],

        // Use google analytics for tracking, set key or null to disable
        'google_analytics' => null,
    ],
];
