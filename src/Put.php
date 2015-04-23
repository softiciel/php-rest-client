<?php
namespace jaenmedina\PhpRestClient\Methods;

class Put extends RestMethod {

    /**
     * @return array
     */
    public function execute($data){
        $data = is_array($data) ? http_build_query($data) : $data;
        $this->setUp();
        $this->setCurlOption('CURLOPT_RETURNTRANSFER', true);
        $this->setCurlOption('CURLOPT_CUSTOMREQUEST', 'PUT');
        $this->setCurlOption('CURLOPT_POSTFIELDS', $data);
        $this->executeCurl();
        $result = $this->getResult();
        $this->tearDown();
        return $result;
    }

}