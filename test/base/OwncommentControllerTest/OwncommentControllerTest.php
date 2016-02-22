<?php

namespace test\base\OwncommentControllerTest;

use Me\base\OwncommentController\OwncommentController;

class OwncommentControllerTest extends \PHPUnit_Framework_TestCase
{
    protected $class;

    protected function setUp()
    {
        $this->class = new OwncommentController();
    }

    public function testAttributes()
    {
        $class = 'Me\base\OwncommentController\OwncommentController';

        $this->assertClassHasAttribute('now', $class, "Attribute 'now' missing in OwncommentController");
        $this->assertClassHasAttribute('form', $class, "Attribute 'form' missing in OwncommentController");
        $this->assertClassHasAttribute('comments', $class, "Attribute 'comments' missing in OwncommentController");
    }
}