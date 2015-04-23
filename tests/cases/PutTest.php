<?php

use GuzzleHttp\Post\PostFile;

class PutTest extends TestCase {

    public function testPutData(){
        $fileName = 'hello_world.html';
        $url = 'http://www.httpmirror.com/put/' . $fileName;
        $putMethod = new Put($url);
        $data = '<html><body><h1>Hello, World!</h1></body></html>';
        $result = $putMethod->execute($data);

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: text/html', $result['header']);
        $this->assertContains('<html><body><h1>The file was created.</h1></body></html>', $result['body']);
    }

    public function testPutArray(){
        $fileName = 'hello_world.html';
        $url = 'http://www.httpmirror.com/put/' . $fileName;
        $putMethod = new Put($url);
        $data = ['abc' => 'def', 'john' => 'doe'];
        $result = $putMethod->execute($data);

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: text/html', $result['header']);
        $this->assertContains('<html><body><h1>The file was created.</h1></body></html>', $result['body']);
    }

    public function testPutFile(){
        $dummyFile = $this->createDummyFile();
        $url = 'http://www.httpmirror.com/put/put_test_file.txt';
        $putMethod = new Put($url);
        $data = new PostFile('file', fopen($dummyFile, 'r'));
        $result = $putMethod->execute($data);

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: text/html', $result['header']);
        $this->assertContains('<html><body><h1>The file was created.</h1></body></html>', $result['body']);
        unlink($dummyFile);
    }

    /**
     * @return string
     */
    public function createDummyFile(){
        $fullPath = 'file.txt';
        file_put_contents($fullPath, 'Some test content just to see if it uploads.');
        return $fullPath;
    }

}