<?php

namespace jaenmedina\PhpRestClient\Tests;
use jaenmedina\PhpRestClient\Methods\Delete;
use jaenmedina\PhpRestClient\Methods\Put;

class DeleteTest extends TestCase {

    public function testDelete(){
        $dummyFileName = $this->createDummyFile();
        $url = 'httpmirror.com/delete/' . $dummyFileName;
        $deleteHelper = new Delete($url);

        $result = $deleteHelper->execute();

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: text/html', $result['header']);
        $this->assertContains('<html><body><h1>URL deleted.</h1></body></html>', $result['body']);
    }

    /**
     * @return string
     */
    private function createDummyFile(){
        $fileName = 'hello_world.html';
        $url = 'http://www.httpmirror.com/put/' . $fileName;
        $putMethod = new Put($url);
        $data = '<html><body><h1>Hello, World!</h1></body></html>';
        $putMethod->execute($data);
        return $fileName;
    }

}