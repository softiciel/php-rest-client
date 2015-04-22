<?php

class GetTest extends TestCase {

    public function testGet(){
        $url = 'http://www.example.com';
        $getHelper = new Get($url);

        $result = $getHelper->execute();

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: text/html', $result['header']);
        $this->assertContains('This domain is established to be used for illustrative examples in documents.', $result['body']);
    }

}