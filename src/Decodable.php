<?php

namespace Asimlqt\EncodeDecode;

/**
 * Encodable
 *
 * @author Asim Liaquat <asimlqt22@gmail.com>
 */
interface Decodable
{
    /**
     *
     * @param mixed $data
     *
     * @return mixed
     *
     * @throws DecodingException
     */
    public function decode($data);
}