<?php

namespace Epay\PaymentClient\ObjectMappers;

use Exception;
use ReflectionClass;
use ReflectionProperty;
use ReflectionException;

class ArrayMapper
{
    /**
     * Maps an array into a specific object
     *
     * @param array $array
     * @param string $class
     *
     * @return mixed
     *
     * @throws ReflectionException
     * @throws Exception
     */
    public static function map(array $array, string $class): mixed
    {
        // Object to return
        $object = new $class();

        // Create reflection class to determined which properties we need to populate
        $reflectionClass = new ReflectionClass($class);

        // Iterate over all properties on the destination class and populate the return object
        foreach ($reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $propertyName = $property->getName();

            // We bail with an exception if the array passed does not
            // contain a needed property on the destination class
            if ( ! array_key_exists($propertyName, $array)) {
                throw new Exception("Invalid data passed to map() method...");
            }

            // Assign the property value to the return object
            $object->$propertyName = $array[$property->getName()];
        }

        return $object;
    }
}