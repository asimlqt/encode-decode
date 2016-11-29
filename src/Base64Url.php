<?php

namespace Asimlqt\EncodeDecode;

class Base64Url implements Encodable, Decodable
{

	public function encode($data)
	{
		if (!is_string($data)) {
			throw new EncodingException();
		}

        return str_replace(
        	['+', '/'],
        	['-', '_'],
        	rtrim(base64_encode($data), "=")
        );
	}

	public function decode($data)
	{
		if (!is_string($data)) {
			throw new DecodingException("data must be a string");
		}

	    $str = str_replace(['-', '_'], ['+', '/'], $data);
	    
	    switch (strlen($str)%4) {
	    	case 0: break;
			case 2: $str .= "=="; break;
			case 3: $str .= "="; break;
			default: throw new DecodingException("Error decoding");
	    }

	    if ($result = base64_decode($str) === false) {
	    	throw new DecodingException("Unable to decode data");	
	    }

	    return $result;
	}
}