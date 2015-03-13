<?php

/**
 * @license https://github.com/simple-es/jms-serializer-bridge/blob/master/LICENSE MIT
 */

namespace SimpleES\JMSSerializerBridge\Serializer;

use JMS\Serializer\SerializerInterface as JMSSerializer;
use SimpleES\EventSourcing\Serializer\SerializesData;

/**
 * @copyright Copyright (c) 2015 Future500 B.V.
 * @author    Jasper N. Brouwer <jasper@future500.nl>
 */
class Serializer implements SerializesData
{
    /**
     * @var JMSSerializer
     */
    private $jmsSerializer;

    /**
     * @var string
     */
    private $format;

    /**
     * @param JMSSerializer $jmsSerializer
     * @param string        $format
     */
    public function __construct(JMSSerializer $jmsSerializer, $format)
    {
        $this->jmsSerializer = $jmsSerializer;
        $this->format        = $format;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($data)
    {
        return $this->jmsSerializer->serialize($data, $this->format);
    }

    /**
     * {@inheritdoc}
     */
    public function deserialize($data, $type)
    {
        return $this->jmsSerializer->deserialize($data, $type, $this->format);
    }
}
