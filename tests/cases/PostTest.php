<?php

class PostTest extends TestCase {

    public function testPost(){
        $url = 'http://www.slugifier.com/api/generate-slug';
        $postHelper = new Post($url);
        $postHelper->setParameter('text', 'Read these tips to improve your résumé and get a great job!');
        $postHelper->setParameter('rules', ['improve' => 'improvement']);
        $postHelper->setParameter('separator', '_');
        $postHelper->setParameter('exclude_stop_words', true);
        $postHelper->setParameter('words_to_exclude', ['read', 'great']);

        $result = $postHelper->post();

        $this->assertContains('HTTP/1.1 200 OK', $result['header']);
        $this->assertContains('Content-Type: application/json', $result['header']);
        $this->assertContains('{"slug":"tips_improvement_resume_job"}', $result['body']);
    }

}