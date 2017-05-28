<?php
namespace Softiciel\PhpRestClient\Methods;

class Head extends RestMethod
{
    /**
     * @return string
     */
    public function execute()
    {
        $this->setUp();
        $this->setCurlOption('CURLOPT_NOBODY', true);
        $this->executeCurl();
        $result = $this->getResult();
        $this->tearDown();
        return $result;
    }
}