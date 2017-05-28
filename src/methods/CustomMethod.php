<?php
namespace Softiciel\PhpRestClient\Methods;

class CustomMethod extends RestMethod
{
    /**
     * @return array
     */
    public function execute()
    {
        $this->startCurlSession();
        $this->setCurlOption('CURLOPT_URL', $this->url);
        $this->executeCurl();
        $result = $this->getResult();
        $this->closeCurlSession();
        return $result;
    }
}