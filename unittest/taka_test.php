<?php

class taka_test extends PHPUnit_Framework_TestCase
{
    private $Taka;

    public function setUp()
    {
        require_once "code/Taka.php";
        $this->Taka = new Taka;
    }

    public function tearDrop()
    {
        $this->Taka = null;
    }

    public function addDataProvider()
    {
        return array(
            array("1,1,2,3, 4","11")
        );
    }
    /**
     * @dataProvider addDataProvider
     * */
    public function testAdd($string,$expected)
    {
        $result = $this->Taka->Add($string);
        $this->assertEquals($expected,$result);
    }
}