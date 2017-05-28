<?php
namespace Softiciel\PhpRestClient\Tests;

use PHPUnit_Framework_TestCase;
use Softiciel\PhpRestClient\Methods\Head;

class HeadTest extends PHPUnit_Framework_TestCase
{
    public function testHead()
    {
        $url = 'http://www.example.com';
        $headMethod = new Head($url);

        $result = $headMethod->execute();

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertNull($headMethod->getBody());
        $this->assertNull($result['body']);
    }
}