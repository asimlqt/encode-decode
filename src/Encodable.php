<?php

namespace Asimlqt\EncodeDecode;

/**
 * Encodable
 *
 * @author Asim Liaquat <asimlqt22@gmail.com>
 */
interface Encodable
{
    /**
     *
     * @param mixed $data
     *
     * @return mixed
     *
     * @throws EncodingException
     */
    public function encode($data);
}