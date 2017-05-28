<?php
namespace Softiciel\PhpRestClient\Tests;

use PHPUnit_Framework_TestCase;
use Softiciel\PhpRestClient\Methods\Put;

class PutTest extends PHPUnit_Framework_TestCase
{
    public function testPutData()
    {
        $url = 'https://httpbin.org/put';
        $putMethod = new Put($url);
        $data = 'Some test text';
        $result = $putMethod->execute($data);

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: application/json', $result['header']);
        $this->assertContains($data, $result['body']);
    }

    public function testPutArray()
    {
        $url = 'https://httpbin.org/put';
        $putMethod = new Put($url);
        $data = ['abc' => 'def', 'john' => 'doe'];

        $result = $putMethod->execute($data);
        $paramResults = json_decode($result['body']);

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: application/json', $result['header']);
        $this->assertEquals('def', $paramResults->form->abc);
        $this->assertEquals('doe', $paramResults->form->john);
    }
}