<?php

namespace jaenmedina\PhpRestClient\Tests;
use jaenmedina\PhpRestClient\Methods\Get;

class RestMethodTest extends TestCase {

    public function testExecuteCurlGetsError(){
        $unexistingURL = 'www.ssndsgfkljnaljbflagf.com';
        $getHelper = new Get($unexistingURL);

        $result = $getHelper->execute();

        $this->assertNull($result['header']);
        $this->assertNull($result['body']);
        $this->assertEquals('Couldn\'t resolve host \'www.ssndsgfkljnaljbflagf.com\'', $result['error']);
    }

    public function testExecuteCurlGetsStatus(){
        $url = 'www.example.com';
        $getHelper = new Get($url);

        $result = $getHelper->execute();

        $this->assertEquals(200, $result['status']);
    }

    public function testExecuteCurlGetsTime(){
        $url = 'www.example.com';
        $getHelper = new Get($url);

        $result = $getHelper->execute();

        $this->assertNotNull($result['time']);
        $this->assertInternalType('float', $result['time']);
    }

}