<?php

namespace jaenmedina\PhpRestClient\Tests;
use jaenmedina\PhpRestClient\Methods\Head;

class HeadTest extends TestCase {

    public function testHead(){
        $url = 'http://www.httpmirror.com/head';
        $headMethod = new Head($url);

        $result = $headMethod->execute();

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: application/json', $result['header']);
        $this->assertNull($headMethod->getBody());
        $this->assertNull($result['body']);
    }

}