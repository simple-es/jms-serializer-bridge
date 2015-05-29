<?php

/**
 * @license https://github.com/simple-es/jms-serializer-bridge/blob/master/LICENSE MIT
 */

namespace SimpleES\JMSSerializerBridge\Test\Auxiliary;

use JMS\Serializer\Annotation\Type;

/**
 * @copyright Copyright (c) 2015 Future500 B.V.
 * @author    Jasper N. Brouwer <jasper@future500.nl>
 */
final class Object
{
    /**
     * @var null
     */
    private $null;

    /**
     * @Type("boolean")
     * @var bool
     */
    private $boolean;

    /**
     * @Type("integer")
     * @var int
     */
    private $integer;

    /**
     * @Type("float")
     * @var float
     */
    private $float;

    /**
     * @Type("string")
     * @var string
     */
    private $string;

    /**
     * @Type("array<string>")
     * @var array
     */
    private $array;

    /**
     * @Type("stdClass")
     * @var object
     */
    private $object;

    /**
     * @param bool   $boolean
     * @param int    $integer
     * @param float  $float
     * @param string $string
     * @param array  $array
     * @param object $object
     */
    public function __construct($boolean, $integer, $float, $string, array $array, $object)
    {
        $this->null    = null;
        $this->boolean = $boolean;
        $this->integer = $integer;
        $this->float   = $float;
        $this->string  = $string;
        $this->array   = $array;
        $this->object  = $object;
    }

    /**
     * @return null
     */
    public function getNull()
    {
        return $this->null;
    }

    /**
     * @return bool
     */
    public function getBoolean()
    {
        return $this->boolean;
    }

    /**
     * @return int
     */
    public function getInteger()
    {
        return $this->integer;
    }

    /**
     * @return float
     */
    public function getFloat()
    {
        return $this->float;
    }

    /**
     * @return string
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * @return object
     */
    public function getObject()
    {
        return $this->object;
    }
}
