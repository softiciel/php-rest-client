<?php

class PostTest extends TestCase {

    public function testPost(){
        $url = 'http://www.slugifier.com/api/generate-slug';
        $postMethod = new Post($url);
        $postMethod->setParameter('text', 'Read these tips to improve your résumé and get a great job!');
        $postMethod->setParameter('rules', ['improve' => 'improvement']);
        $postMethod->setParameter('separator', '_');
        $postMethod->setParameter('exclude_stop_words', true);
        $postMethod->setParameter('words_to_exclude', ['read', 'great']);

        $result = $postMethod->execute();

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: application/json', $result['header']);
        $this->assertContains('{"slug":"tips_improvement_resume_job"}', $result['body']);
    }

}