<?php

class CurlHelper {

    /**
     * @var resource
     */
    private $curlHandler;

    /**
     * @return resource
     */
    public function getCurlHandler(){
        return $this->curlHandler;
    }

    /**
     * @return mixed
     */
    public function executeCurl(){
        return curl_exec($this->curlHandler);
    }

    public function closeCurlSession(){
        curl_close($this->curlHandler);
    }

    /**
     * @param int $curlOption
     * @param mixed $value
     */
    public function setCurlOption($curlOption, $value){
        curl_setopt($this->curlHandler, $curlOption, $value);
    }

    /**
     * @param int $info
     * @return mixed
     */
    public function getCurlInfo($info){
        return curl_getinfo($this->curlHandler, $info);
    }

    /**
     * @return string
     */
    public function getCurlError(){
        return curl_error($this->curlHandler);
    }

    public function startCurlSession() {
        $this->curlHandler = curl_init();
        curl_setopt($this->curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curlHandler, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandler, CURLOPT_VERBOSE, true);
        curl_setopt($this->curlHandler, CURLOPT_HEADER, true);
    }

}