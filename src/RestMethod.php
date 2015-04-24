<?php

namespace jaenmedina\PhpRestClient\Methods;

abstract class RestMethod {

    const DEFAULT_USER_AGENT = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.1 Safari/537.36';

    /**
     * @var CurlHelper
     */
    protected $curlHelper;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var float
     */
    protected $time;

    /**
     * @var string
     */
    protected $header;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string
     */
    protected $error;

    /**
     * @var array
     */
    protected $curlOptions;

    /**
     * @param string $url
     */
    public function __construct($url){
        $this->curlHelper = new CurlHelper();
        $this->url = $url;
    }

    /**
     * Fixtures
     */
    protected function setUp(){
        $this->startCurlSession();
        $this->setCurlOption('CURLOPT_URL', $this->url);
        $this->setCurlOption('CURLOPT_USERAGENT', self::DEFAULT_USER_AGENT);
        $this->setCurlOption('CURLOPT_FOLLOWLOCATION', true);
        $this->setCurlOption('CURLOPT_MAXREDIRS', 5);
        $this->setCurlOption('CURLOPT_VERBOSE', false);
    }

    protected function tearDown(){
        $this->closeCurlSession();
    }

    /**
     * Getters and Setters
     */

    /**
     * @return string
     */
    public function getURL(){
        return $this->url;
    }

    /**
     * @param string $newURL
     */
    public function setURL($newURL){
        $this->url = $newURL;
    }

    /**
     * @return string
     */
    public function getHeader(){
        return $this->header;
    }

    /**
     * @return string
     */
    public function getBody(){
        return $this->body;
    }

    /**
     * Methods
     */

    /**
     * @return mixed
     */
    protected function executeCurl(){
        $this->applyCurlOptions();
        $result = $this->curlHelper->executeCurl();
        $this->setStatusAndTime();
        if($result != false){
            if($this->headersAreIncluded()){
                $header_size = $this->curlHelper->getCurlInfo(CURLINFO_HEADER_SIZE);
                $this->header = substr($result, 0, $header_size);
                if($header_size != strlen($result)){
                    $this->body = substr($result, $header_size);
                }
            }
            else{
                $this->body = $result;
            }

        }
        else{
            $error = $this->curlHelper->getCurlError();
            $this->error = $error != "" ? $error : null;
        }
    }

    private function setStatusAndTime(){
        $this->status = $this->curlHelper->getCurlInfo(CURLINFO_HTTP_CODE);
        $this->time = $this->curlHelper->getCurlInfo(CURLINFO_TOTAL_TIME) * 1000;
    }

    protected function startCurlSession(){
        $this->curlHelper->startCurlSession();
    }

    protected function closeCurlSession(){
        $this->curlHelper->closeCurlSession();
    }

    /**
     * @return bool
     */
    private function headersAreIncluded(){
        return (!isset($this->curlOptions['CURLOPT_HEADER']) || $this->curlOptions['CURLOPT_HEADER']);
    }

    /**
     * @return array
     */
    protected function getResult(){
        return [
            'status' => $this->status,
            'time' => $this->time,
            'header' => $this->header,
            'body' => $this->body,
            'error' => $this->error
        ];
    }

    private function applyCurlOptions(){
        if($this->curlOptions){
            foreach($this->curlOptions as $optionName => $optionValue){
                $this->curlHelper->setCurlOption(constant($optionName), $optionValue);
            }
        }
    }

    /**
     * @param string $option
     * @param mixed $value
     */
    public function setCurlOption($option, $value){
        $this->curlOptions[$option] = $value;
    }

}
