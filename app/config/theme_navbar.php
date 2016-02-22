<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',

    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'home'  => [
          'text'  => 'Home',
          'url'   => $this->di->get('url')->create(''),
          'title' => 'Home route of current frontcontroller'
        ],


        'start'  => [
          'text'  => 'Start',
          'url'   => $this->di->get('url')->create('theme'),
          'title' => 'Home route of current frontcontroller'
        ],

        // This is a menu item
        'regions'  => [
          'text'  => 'Regioner',
          'url'   => $this->di->get('url')->create('theme/regions'),
          'title' => 'Regions of Caligula',
        ],

        'typography'  => [
          'text'  => 'Typografi',
          'url'   => $this->di->get('url')->create('theme/typography'),
          'title' => 'typography of Caligula',
        ],

        'font-awesome'  => [
          'text'  => 'Font Awesome',
          'url'   => $this->di->get('url')->create('theme/font-awesome'),
          'title' => 'Font awesome of Caligula',
        ],

    ],



    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getCurrentUrl(false)) {
            return true;
        }
    },



    /**
     * Callback to check if current page is a decendant of the menuitem, this check applies for those
     * menuitems that has the setting 'mark-if-parent' set to true.
     *
     */
    'is_parent' => function ($parent) {
        $route = $this->di->get('request')->getRoute();
        return !substr_compare($parent, $route, 0, strlen($parent));
    },



    /**
     * Callback to create the url, if needed, else comment out.
     *
     */
    /*
     'create_url' => function ($url) {
         return $this->di->get('url')->create($url);
     },
     */
];
