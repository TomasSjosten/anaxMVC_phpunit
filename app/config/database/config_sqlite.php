<?php


return [
    // Its best to add an absolute path to the dsn
    'dsn'     => 'sqlite:'.__DIR__.'/../../content/database/caligula_sqlite.db',

    // Display details on what happens
    'verbose' => false,

    // Throw a more verbose exception when failing to connect
    //'debug_connect' => 'true',
];
