<?php

namespace jaenmedina\PhpRestClient\Methods;

class Post extends RestMethod {

    /**
     * @var array
     */
    private $parameters;

    /**
     * @param string $url
     */
    public function __construct($url){
        parent::__construct($url);
        $this->parameters = [];
    }

    /**
     * @return array
     */
    public function execute(){
        $this->setUp();
        $this->setCurlOption('CURLOPT_POST', true);
        $this->setCurlOption('CURLOPT_POSTFIELDS', http_build_query($this->parameters));
        $this->executeCurl();
        $result = $this->getResult();
        $this->tearDown();
        return $result;
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function setParameter($name, $value){
        $this->parameters[$name] = $value;
    }

    /**
     * @param array $parameters
     */
    public function setParameters($parameters){
        $this->parameters = $parameters;
    }

    /**
     * @param $name
     */
    public function deleteParameter($name){
        unset($this->parameters[$name]);
    }

    /**
     * @return array
     */
    public function getParameters(){
        return $this->parameters;
    }

}