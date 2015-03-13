<?php

/**
 * @license   https://github.com/simple-es/jms-serializer-bridge/blob/master/LICENSE MIT
 * @copyright Copyright (c) 2015 Future500 B.V.
 * @author    Jasper N. Brouwer <jasper@future500.nl>
 */

use Doctrine\Common\Annotations\AnnotationRegistry;

AnnotationRegistry::registerLoader('class_exists');
AnnotationRegistry::registerFile(__DIR__ . '/../vendor/jms/serializer/src/JMS/Serializer/Annotation/Type.php');
