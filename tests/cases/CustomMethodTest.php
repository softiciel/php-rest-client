<?php

namespace jaenmedina\PhpRestClient\Tests;
use jaenmedina\PhpRestClient\Methods\CustomMethod;

class CustomTest extends TestCase {

    public function testExecute(){
        $url = 'http://www.example.com';
        $curlOptions = [
            'CURLOPT_HEADER' => false
        ];
        $customRequest = new CustomMethod($url);
        foreach($curlOptions as $optionName => $optionValue){
            $customRequest->setCurlOption($optionName, $optionValue);
        }

        $result = $customRequest->execute();

        $this->assertNull($result['header']);
        $this->assertContains('This domain is established to be used for illustrative examples in documents.', $result['body']);
    }

} 