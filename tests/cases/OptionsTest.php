<?php

class OptionsTest extends TestCase {

    public function testOptions(){
        $url = 'http://www.example.com';
        $optionsMethod = new Options($url);

        $result = $optionsMethod->execute();

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Allow: OPTIONS, GET, HEAD, POST', $result['header']);
        $this->assertNull($optionsMethod->getBody());
        $this->assertNull($result['body']);
    }

}