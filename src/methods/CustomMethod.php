<?php
namespace Softiciel\PhpRestClient\Methods;

class CustomMethod extends RestMethod
{
    /**
     * @param string $method
     * @return array
     */
    public function execute($method)
    {
        $this->startCurlSession();
        $this->setCurlOption('CURLOPT_URL', $this->url);
        $this->setCurlOption('CURLOPT_CUSTOMREQUEST', $method);
        $this->executeCurl();
        $result = $this->getResult();
        $this->closeCurlSession();
        return $result;
    }
}