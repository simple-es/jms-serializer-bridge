<?php

/**
 * @license https://github.com/simple-es/jms-serializer-bridge/blob/master/LICENSE MIT
 */

namespace SimpleES\JMSSerializerBridge\Test\Core;

use JMS\Serializer\SerializerBuilder;
use SimpleES\JMSSerializerBridge\Serializer\Serializer;
use SimpleES\JMSSerializerBridge\Test\Auxiliary\Object;

/**
 * @copyright Copyright (c) 2015 Future500 B.V.
 * @author    Jasper N. Brouwer <jasper@future500.nl>
 */
class IntegrationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function setUp()
    {
        $jmsSerializer = SerializerBuilder::create()->build();

        $this->serializer = new Serializer($jmsSerializer, 'json');
    }

    public function tearDown()
    {
        $this->serializer = null;
    }

    /**
     * @test
     */
    public function itSerializesAndDeserializes()
    {
        $originalObject = new Object(true, 1, 2.3, 'foo', ['bar', 'baz'], new \stdClass());

        $serializedObject = $this->serializer->serialize($originalObject);

        $this->assertInternalType('string', $serializedObject);

        $deserializedObject = $this->serializer->deserialize(
            $serializedObject,
            'SimpleES\JMSSerializerBridge\Test\Auxiliary\Object'
        );

        $this->assertEquals($originalObject, $deserializedObject);
    }
}
