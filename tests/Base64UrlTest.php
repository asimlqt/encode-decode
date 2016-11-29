<?php

namespace Asimlqt\EncodeDecode\Test;

use Asimlqt\EncodeDecode\Base64Url;

class Base64UrlTest extends \PHPUnit_Framework_TestCase
{

	public function testEncode()
	{
		$encoder = new Base64Url();
		$expected = "RW5jb2RlL0RlY29kZSBsaWJyYXJ5IGZvciBQSFA";
		$actual = $encoder->encode("Encode/Decode library for PHP");
		$this->assertEquals($expected, $actual);
	}

	public function testDecode()
	{
		$encoder = new Base64Url();
		$actual = $encoder->decode("RW5jb2RlL0RlY29kZSBsaWJyYXJ5IGZvciBQSFA");
		$expected = "Encode/Decode library for PHP";
		$this->assertEquals($expected, $actual);
	}

}