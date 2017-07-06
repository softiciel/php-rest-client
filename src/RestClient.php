<?php

namespace Softiciel\PhpRestClient;

class RestClient
{
    /**
     * @param array $parameters
     * @return array
     */
    public static function execute($parameters)
    {
        $class = "Softiciel\\PhpRestClient\\Methods\\" . ucfirst($parameters['method']);
        $method = new $class($parameters['url']);
        if (isset($parameters['parameters'])) {
            $method->setParameters($parameters['parameters']);
        }
        return $method->execute();
    }
}