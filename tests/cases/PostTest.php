<?php
namespace Softiciel\PhpRestClient\Tests;

use PHPUnit_Framework_TestCase;
use Softiciel\PhpRestClient\Methods\Post;

class PostTest extends PHPUnit_Framework_TestCase
{
    public function testPost()
    {
        $url = 'https://httpbin.org/post';
        $postMethod = new Post($url);
        $postMethod->setParameter('text', 'Some test text');

        $result = $postMethod->execute();
        $paramResults = json_decode($result['body']);

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: application/json', $result['header']);
        $this->assertEquals('Some test text', $paramResults->form->text);
    }
}