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
      'path' => ANAX_INSTALL_PATH.'theme/',
      'name' => 'anax-base',
    ],


    /**
     * Add default views.
     */
    'views' => [
      [
        'region' => 'navbar',
        'template' => [
          'callback' => function () {
              return $this->di->navbar->create();
          },
        ],
        'data' => [],
        'sort' => -1,
      ],

      [
        'region' => 'header',
        'template' => 'me/header',
        'data' => [
          'siteTitle' => "Caligula",
          'siteTagline' => "Made with MVC!",
        ],
        'sort' => -1,
      ],
      ['region' => 'footer', 'template' => 'me/footer', 'data' => [], 'sort' => -1],
    ],


    /**
     * Data to extract and send as variables to the main template file.
     */
    'data' => [

        // Base URL for the site
        'baseurl' => ANAX_BASE_PATH,

        // Language for this page.
        'lang' => 'sv',

        // Append this value to each <title>
        'title_append' => ' | Caligula MVC',

        // Stylesheets
        'stylesheets' => [
          'css/caligula_css/stylesheets/screen.css',
          'css/caligula_css/stylesheets/navbar.css',
          'css/caligula_css/stylesheets/form.css',
          'css/caligula_css/stylesheets/messagebox.css',
        ],

        // Inline style
        'style' => null,

        // Favicon
        'favicon' => 'favicon.ico',

        // Path to modernizr or null to disable
        'modernizr' => 'js/modernizr.js',

        // Path to jquery or null to disable
        'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js',

        // Array with javscript-files to include
        'javascript_include' => [
          'js/base.js',
          'js/message.js'
        ],

        // Use google analytics for tracking, set key or null to disable
        'google_analytics' => null,
    ],
];
