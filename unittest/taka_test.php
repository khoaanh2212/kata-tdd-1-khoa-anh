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
            array("", "0"),
            array("1", "1"),
            array("1,2", "3"),
            array("1,1,2,3, 4", "11"),
            array("1\n2,3", "6"),
            array("//;\n1;2;3", "6"),
            array("//;\n1;-2;3;-4", "4"),
            array("//;\n1;2;3;1001", "6")
        );
    }

    /**
     * @dataProvider addDataProvider
     * */
    public function testAdd($string, $expected)
    {
        $result = $this->Taka->Add($string);
        $this->assertEquals($expected, $result);
    }
}