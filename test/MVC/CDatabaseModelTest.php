<?php


namespace Anax\MVC;


class CDatabaseModelTest extends AbstractDatabase
{
    protected $db;

    protected function setUp()
    {
        //$this->db = parent::getConnection();
    }

    public function getDataSet()
    {
        //return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/guestbook-seed.xml');
    }
}
