<?php

namespace Asimlqt\EncodeDecode;

/**
 * Json
 *
 * @author Asim Liaquat <asimlqt22@gmail.com>
 */
class Json implements Encodable, Decodable
{
    /**
     *
     * @var int
     */
    private $options = 0;

    /**
     *
     * @var int
     */
    private $depth = 512;

    /**
     *
     * @var bool
     */
    private $assoc = true;

    /**
     * {@inheritdoc}
     */
    public function encode($data)
    {
        $value = json_encode($data, $this->options, $this->depth);

        if ($value === false) {
            throw new EncodingException();
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function decode($data)
    {
        $value = json_decode($data, $this->assoc, $this->depth, $this->options);

        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return $value;

            case JSON_ERROR_DEPTH:
                throw new DecodingException("Maximum stack depth exceeded", JSON_ERROR_DEPTH);

            case JSON_ERROR_STATE_MISMATCH:
                throw new DecodingException("Underflow or the modes mismatch", JSON_ERROR_STATE_MISMATCH);

            case JSON_ERROR_CTRL_CHAR:
                throw new DecodingException("Unexpected control character found", JSON_ERROR_CTRL_CHAR);

            case JSON_ERROR_SYNTAX:
                throw new DecodingException("Syntax error, malformed JSON", JSON_ERROR_SYNTAX);

            case JSON_ERROR_UTF8:
                throw new DecodingException("Malformed UTF-8 characters, possibly incorrectly encoded", JSON_ERROR_UTF8);

            default:
                throw new DecodingException("Unknown error");
        }
    }

    /**
     *
     * @return int
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     *
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     *
     * @param int $options
     *
     * @return Json
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     *
     * @param int $depth
     *
     * @return Json
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     *
     * @return bool
     */
    public function getAssoc()
    {
        return $this->assoc;
    }

    /**
     *
     * @param bool $assoc
     *
     * @return Json
     */
    public function setAssoc($assoc)
    {
        $this->assoc = $assoc;

        return $this;
    }

}
