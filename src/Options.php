<?php

class Options extends RestMethod {

    /**
     * @return array
     */
    public function execute(){
        $this->setUp();
        $this->setCurlOption('CURLOPT_CUSTOMREQUEST', 'OPTIONS');
        $this->executeCurl();
        $result = $this->getResult();
        $this->tearDown();
        return $result;
    }

}