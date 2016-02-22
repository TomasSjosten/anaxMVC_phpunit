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
        'home' => [
          'class' => 'mainitem',
          'text' => 'Home',
          'url' => $this->di->get('url')->create(''),
          'title' => 'Home route of current frontcontroller',
        ],

        // This is a menu item
        'presentation' => [
          'class' => 'mainitem',
          'text' => 'Presentation',
          'url' => $this->di->get('url')->create('presentation'),
          'title' => 'Presentation of the PHPMVC-course',

          // Here we add the submenu, with some menu items, as part of a existing menu item
          'submenu' => [

            'items' => [

                // This is a menu item of the submenu
                'item 0' => [
                  'class' => 'underitem',
                  'text' => 'Kmom01',
                  'url' => $this->di->get('url')->create('presentation/showthis/kmom01'),
                  'title' => 'Presentation of kmom01',
                ],

                'item 1' => [
                  'class' => 'underitem',
                  'text' => 'Kmom02',
                  'url' => $this->di->get('url')->create('presentation/showthis/kmom02'),
                  'title' => 'Presentation of kmom02',
                ],
                'item 2' => [
                  'class' => 'underitem',
                  'text' => 'Kmom03',
                  'url' => $this->di->get('url')->create('presentation/showthis/kmom03'),
                  'title' => 'Presentation of kmom03',
                ],
                'item 3' => [
                  'class' => 'underitem',
                  'text' => 'Kmom04',
                  'url' => $this->di->get('url')->create('presentation/showthis/kmom04'),
                  'title' => 'Presentation of kmom04',
                ],
                'item 4' => [
                  'class' => 'underitem',
                  'text' => 'Kmom05',
                  'url' => $this->di->get('url')->create('presentation/showthis/kmom05'),
                  'title' => 'Presentation of kmom05',
                ],
            ],
          ],
        ],



        'users' => [
          'class' => 'mainitem',
          'text' => 'Users',
          'url' => $this->di->get('url')->create('users'),
          'title' => 'Users',

          // Here we add the submenu, with some menu items, as part of a existing menu item
          'submenu' => [

            'items' => [

                // This is a menu item of the submenu
                'item 0' => [
                  'class' => 'underitem',
                  'text' => 'Restore database',
                  'url' => $this->di->get('url')->create('users/setup'),
                  'title' => 'Restore users',
                ],

                'item 1' => [
                  'class' => 'underitem',
                  'text' => 'List of users',
                  'url' => $this->di->get('url')->create('users/list'),
                  'title' => 'List of users',
                ],

                'item 2' => [
                  'class' => 'underitem',
                  'text' => 'Add user',
                  'url' => $this->di->get('url')->create('users/add'),
                  'title' => 'Add a user',
                ],
            ],
          ],
        ],



        'theme' => [
          'class' => 'mainitem',
          'text' => 'Theme',
          'url' => $this->di->get('url')->create('theme'),
          'title' => 'Throw a die or two',
        ],


        'simpleform2b' => [
          'class' => 'mainitem',
          'text' => 'Simpleform2b',
          'url' => $this->di->get('url')->create('simpleform2b'),
          'title' => 'Testing simpleform2b',
        ],






        'comments' => [
          'class' => 'mainitem',
          'text' => 'Comments',
          'url' => $this->di->get('url')->create('comments'),
          'title' => 'Comments',

          'submenu' => [
              'items' => [
                  'item 0' => [
                      'class' => 'underitem',
                      'text' => 'Reset database',
                      'url' => $this->di->get('url')->create('owncomment/setup'),
                      'title' => 'Reset database'
                  ]
              ]
          ]
        ],




        'CForm' => [
          'class' => 'mainitem',
          'text' => 'CForm',
          'url' => $this->di->get('url')->create('CForm'),
          'title' => 'CForm',
        ],




        'source' => [
          'class' => 'mainitem',
          'text' => 'Source',
          'url' => $this->di->get('url')->create('source'),
          'title' => 'Source code of the site',
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
