<?php

namespace Epay\PaymentClient\ObjectMappers;

use Exception;
use ReflectionException;

class JsonMapper
{
    /**
     * Maps a json string into a specific object
     *
     * @param string $json
     * @param string $class
     *
     * @return mixed
     *
     * @throws ReflectionException
     * @throws Exception
     */
    public static function map(string $json, string $class): mixed
    {
        // We start by converting the json to an array
        $dataArray = json_decode($json, true);

        // Then we pass the array through the ArrayMapper
        return ArrayMapper::map($dataArray, $class);
    }
}