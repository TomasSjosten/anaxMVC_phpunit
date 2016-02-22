<?php

namespace test\base\UsersControllerTest;

class UsersControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testAttributes()
    {
        $class = 'Me\base\UsersController\UsersController';

        $this->assertClassHasAttribute('now', $class, "Attribute 'now' missing in UsersController");
        $this->assertClassHasAttribute('form', $class, "Attribute 'form' missing in UsersController");
        $this->assertClassHasAttribute('users', $class, "Attribute 'users' missing in UsersController");


    }
}