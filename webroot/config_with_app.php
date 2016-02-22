<?php
/**
 * Config file for pagecontrollers, creating an instance of $app.
 *
 */

// Get environment & autoloader.
require __DIR__.'/config.php';


// Create services and inject into the app. 
$di = new Me\base\APP\CDIFactory();

$app = new \Anax\Kernel\CAnax($di);
$app->session();