<?php

namespace test\base\UsersControllerTest;

use Me\base\UsersController\UsersController;

class UsersControllerTest extends \PHPUnit_Framework_TestCase
{
    private $class;
    private $userObject;

    public function setUp()
    {
        $this->class = 'Me\base\UsersController\UsersController';
        $this->userObject = new UsersController();
    }

    public function testAttributes()
    {
        $this->assertClassHasAttribute('now', $this->class, "Attribute 'now' missing in UsersController");
        $this->assertClassHasAttribute('form', $this->class, "Attribute 'form' missing in UsersController");
        $this->assertClassHasAttribute('users', $this->class, "Attribute 'users' missing in UsersController");
    }


    public function testDatabaseTable()
    {
        // Get table array
        $userTable = $this->invokeMethod($this->userObject, 'setTableNames');

        // Check if it's an array
        $this->assertTrue(is_array($userTable), 'userTable is not an array');

        // Check the default keys
        $this->assertArrayHasKey('id', $userTable, 'userTable array missing ID key. UsersController');
        $this->assertArrayHasKey('acronym', $userTable, 'userTable array missing Acronym key. UsersController');
        $this->assertArrayHasKey('email', $userTable, 'userTable array missing Email key. UsersController');
        $this->assertArrayHasKey('name', $userTable, 'userTable array missing Name key. UsersController');
        $this->assertArrayHasKey('password', $userTable, 'userTable array missing Password key. UsersController');
        $this->assertArrayHasKey('created', $userTable, 'userTable array missing Created key. UsersController');
        $this->assertArrayHasKey('updated', $userTable, 'userTable array missing Updated key. UsersController');
        $this->assertArrayHasKey('deleted', $userTable, 'userTable array missing Deleted key. UsersController');
        $this->assertArrayHasKey('active', $userTable, 'userTable array missing Active key. UsersController');

        // Check that there isn't any unwanted keys
        $this->assertEquals(count($userTable), 9, 'userTable contains too many Keys');


        // Adding options to table
        $optionalUserTable =[
          [
            'comment_text' => ['text(3000)'],
            'image' => ['varchar(255)'],
          ]];

        // Get new table structure array
        $userTableInjected = $this->invokeMethod($this->userObject, 'setTableNames', $optionalUserTable);

        // Check if Array
        $this->assertTrue(is_array($userTableInjected));

        // Check that the new keys where added
        $this->assertArrayHasKey('comment_text', $userTableInjected, 'Injected table missing Comment_text column UsersController');
        $this->assertArrayHasKey('image', $userTableInjected, 'Injected table missing Image column UsersController');

        // Check that value is consistent
        $this->assertEquals(count($userTableInjected), 11, 'Injected table missing columns');


    }


    public function invokeMethod($object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
