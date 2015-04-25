<?php
require_once getcwd() . '/vendor/autoload.php';

spl_autoload_register(
    function ($class)
    {
        static $classes = NULL;
        static $path    = NULL;

        if ($classes === NULL) {
            $classes = array(
                'jaenmedina\PhpRestClient\Methods\CurlHelper'   => '/src/CurlHelper.php',
                'jaenmedina\PhpRestClient\Methods\Get'          => '/src/Get.php',
                'jaenmedina\PhpRestClient\Methods\Post'         => '/src/Post.php',
                'jaenmedina\PhpRestClient\Methods\Put'          => '/src/Put.php',
                'jaenmedina\PhpRestClient\Methods\Head'         => '/src/Head.php',
                'jaenmedina\PhpRestClient\Methods\Options'      => '/src/Options.php',
                'jaenmedina\PhpRestClient\Methods\Delete'       => '/src/Delete.php',
                'jaenmedina\PhpRestClient\Methods\CustomMethod' => '/src/CustomMethod.php',
                'jaenmedina\PhpRestClient\Methods\RestMethod'   => '/src/RestMethod.php',

                'jaenmedina\PhpRestClient\Tests\TestCase'       => '/tests/cases/TestCase.php',
            );
            $path = dirname(__FILE__);
        }

        if (isset($classes[$class])) {
            require $path . $classes[$class];
        }
    }
);