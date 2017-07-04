<?php

namespace Asimlqt\EncodeDecode;

/**
 * Base64Url
 */
class Base64Url implements Encodable, Decodable
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function decode($data)
    {
        if (!is_string($data)) {
            throw new DecodingException("data must be a string");
        }

        $result = base64_decode(
            str_pad(
                strtr($data, '-_', '+/'),
                strlen($data) % 4,
                '=',
                STR_PAD_RIGHT
            )
        );

        if ($result === false) {
            throw new DecodingException("Unable to decode data");
        }

        return $result;
    }

}
