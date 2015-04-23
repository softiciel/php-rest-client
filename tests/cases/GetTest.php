<?php

namespace jaenmedina\PhpRestClient\Tests;
use jaenmedina\PhpRestClient\Methods\Get;

class GetTest extends TestCase {

    public function testGet(){
        $url = 'http://www.example.com';
        $getMethod = new Get($url);

        $result = $getMethod->execute();

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: text/html', $result['header']);
        $this->assertContains('This domain is established to be used for illustrative examples in documents.', $result['body']);
    }

}