<?php

return [
    // Set up details on how to connect to the database
    'dsn'     => "mysql:host=localhost;dbname=DBNAME;charset=utf8",
    'username'        => "DNAME",
    'password'        => "DBPASS",
    'driver_options'  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    'table_prefix'    => "test_",

    // Display details on what happens
    'verbose' => true,

    // Throw a more verbose exception when failing to connect
    //'debug_connect' => 'true',
];
