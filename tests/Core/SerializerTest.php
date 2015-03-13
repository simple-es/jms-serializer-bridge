<?php

/**
 * @license https://github.com/simple-es/jms-serializer-bridge/blob/master/LICENSE MIT
 */

namespace SimpleES\JMSSerializerBridge\Test\Core;

use SimpleES\JMSSerializerBridge\Serializer\Serializer;

/**
 * @copyright Copyright (c) 2015 Future500 B.V.
 * @author    Jasper N. Brouwer <jasper@future500.nl>
 */
class SerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $jmsSerializer;

    public function setUp()
    {
        $this->jmsSerializer = $this->getMock('JMS\Serializer\SerializerInterface');

        $this->serializer = new Serializer($this->jmsSerializer, 'json');
    }

    public function tearDown()
    {
        $this->serializer    = null;
        $this->jmsSerializer = null;
    }

    /**
     * @test
     */
    public function itUsesJMSSerializerToSerializeData()
    {
        $object = new \stdClass();
        $string = '{"some_key": "Some value"}';

        $this->jmsSerializer
            ->expects($this->once())
            ->method('serialize')
            ->with($object, 'json')
            ->will($this->returnValue($string));

        $serializedObject = $this->serializer->serialize($object);

        $this->assertSame($string, $serializedObject);
    }

    /**
     * @test
     */
    public function itUsesJMSSerializerToDeserializeData()
    {
        $string = '{"some_key": "Some value"}';
        $object = new \stdClass();

        $this->jmsSerializer
            ->expects($this->once())
            ->method('deserialize')
            ->with($string, 'stdClass')
            ->will($this->returnValue($object));

        $deserializedObject = $this->serializer->deserialize($string, 'stdClass');

        $this->assertSame($object, $deserializedObject);
    }
}
