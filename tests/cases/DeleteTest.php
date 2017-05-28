<?php
namespace Softiciel\PhpRestClient\Tests;

use PHPUnit_Framework_TestCase;
use Softiciel\PhpRestClient\Methods\Delete;
use Softiciel\PhpRestClient\Methods\Put;

class DeleteTest extends PHPUnit_Framework_TestCase
{
    public function testDelete()
    {
        $url = 'https://httpbin.org/delete';
        $deleteHelper = new Delete($url);

        $result = $deleteHelper->execute();

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: application/json', $result['header']);
    }
}