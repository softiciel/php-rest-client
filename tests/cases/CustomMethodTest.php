<?php
namespace Softiciel\PhpRestClient\Tests;

use PHPUnit_Framework_TestCase;
use Softiciel\PhpRestClient\Methods\CustomMethod;

class CustomTest extends PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $url = 'http://www.example.com';
        $method = 'EXECUTE';
        $customRequest = new CustomMethod($url);

        $result = $customRequest->execute($method);

        $this->assertEquals(501, $result['status']);
    }
}