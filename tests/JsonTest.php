<?php

namespace Asimlqt\EncodeDecode\Test;

use Asimlqt\EncodeDecode\Json;

class JsonTest extends \PHPUnit_Framework_TestCase
{

    public function testEncode()
    {
        $encoder = new Json();
        $actual = $encoder->encode(["hello" => "world"]);
        $expected = '{"hello":"world"}';
        $this->assertEquals($expected, $actual);
    }

    public function testDecode()
    {
        $encoder = new Json();
        $actual = $encoder->decode('{"hello":"world"}');
        $expected = ["hello" => "world"];
        $this->assertEquals($expected, $actual);
    }

}
