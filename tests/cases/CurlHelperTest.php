<?php
namespace Softiciel\PhpRestClient\Tests;

use PHPUnit_Framework_TestCase;
use Softiciel\PhpRestClient\CurlHelper;

class CurlHelperTest extends PHPUnit_Framework_TestCase
{
    public function testExecuteSimpleCurlOperation()
    {
        $curlHelper = new CurlHelper();
        $curlHelper->startCurlSession();
        $curlHelper->setCurlOption(CURLOPT_URL, 'http://www.example.com');
        $curlHelper->setCurlOption(CURLOPT_VERBOSE, false);
        $result = $curlHelper->executeCurl();
        $curlHelper->closeCurlSession();

        $this->assertContains('HTTP/1.1 200 OK', $result);
    }

    public function testGetCurlInfo()
    {
        $curlHelper = new CurlHelper();
        $curlHelper->startCurlSession();
        $curlHelper->setCurlOption(CURLOPT_URL, 'http://www.example.com');
        $curlHelper->setCurlOption(CURLOPT_VERBOSE, false);
        $curlHelper->executeCurl();
        $status = $curlHelper->getCurlInfo(CURLINFO_HTTP_CODE);
        $curlHelper->closeCurlSession();

        $this->assertEquals(200, $status);
    }

    public function testGetCurlError()
    {
        $curlHelper = new CurlHelper();
        $curlHelper->startCurlSession();
        $curlHelper->setCurlOption(CURLOPT_URL, 'http://www.slhgsdlkf08190409248-fnaldkg0832r.com');
        $curlHelper->setCurlOption(CURLOPT_VERBOSE, false);
        $curlHelper->executeCurl();
        $hostNoFoundConstant = $curlHelper->getCurlInfo(CURLINFO_HTTP_CODE);

        $curlHelper->closeCurlSession();

        $this->assertEquals(0, $hostNoFoundConstant);
    }
}