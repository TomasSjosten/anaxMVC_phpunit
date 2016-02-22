<?php

namespace Me\base\APP;


use Anax\DI\CDIFactoryDefault;
use Me\base\UsersController\UsersController;
use Mos\Database\CDatabaseBasic;
use tomas\Message\Message;

class CDIFactory extends CDIFactoryDefault
{
    public function __construct()
    {
        parent::__construct();
        $this->set('form', '\Mos\HTMLForm\CForm');



        $this->set('db', function() {
            $db = new CDatabaseBasic();
            $db->setOptions(require ANAX_APP_PATH . 'config/database/config_sqlite.php');
            $db->connect();
            return $db;
        });


        $this->set('UsersController', function() {
            $controller = new UsersController();
            $controller->setDI($this);
            return $controller;
        });



        $this->set('message', function() {
            $message = new Message();
            return $message;
        });
    }
}