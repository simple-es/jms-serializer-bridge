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
     * @var \Mockery\MockInterface
     */
    private $jmsSerializer;

    public function setUp()
    {
        $this->jmsSerializer = \Mockery::mock('JMS\Serializer\SerializerInterface');

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
            ->shouldReceive('serialize')
            ->once()
            ->with($object, 'json')
            ->andReturn($string);

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
            ->shouldReceive('deserialize')
            ->once()
            ->with($string, 'stdClass', 'json')
            ->andReturn($object);

        $deserializedObject = $this->serializer->deserialize($string, 'stdClass');

        $this->assertSame($object, $deserializedObject);
    }
}
