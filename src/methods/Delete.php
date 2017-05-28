<?php
namespace Softiciel\PhpRestClient\Methods;

class Delete extends RestMethod
{
    /**
     * @return array
     */
    public function execute(){
        $this->setUp();
        $this->setCurlOption('CURLOPT_CUSTOMREQUEST', 'DELETE');
        $this->executeCurl();
        $result = $this->getResult();
        $this->tearDown();
        return $result;
    }
}

