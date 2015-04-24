PHP REST Client
=========
[![Build Status](https://travis-ci.org/jaenmedina/php-rest-client.svg?branch=master)](https://travis-ci.org/jaenmedina/php-rest-client)
[![Codacy Badge](https://www.codacy.com/project/badge/6db38b171c54491d866546f95a73312f)](https://www.codacy.com/app/jaen-medina/php-rest-client)

A PHP REST Client.


Version
----

0.1.0


Install with composer
--------------

Add the package dependency jaenmedina/php-rest-client in your composer.json
```sh
{
    "require": {
        "jaenmedina/php-rest-client": "0.1.0"
    }
}
```


How to use?
--------------

Just instantiate the method you want to execute. There is support for GET, POST, PUT HEAD and OPTIONS methods.

For GET method:

```sh
$url = 'httpmirror.com';
$getMethod = new Get($url);
$result = $getMethod->execute();
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'.
```

For POST method:
```sh
$url = 'slugifier.com/api/generate-slug';
$postMethod = new Post($url);
$postMethod->setParameter('text', 'Read these tips to improve your résumé and get a great job!');
$postMethod->setParameter('rules', ['improve' => 'improvement']);
$postMethod->setParameter('separator', '_');
$postMethod->setParameter('exclude_stop_words', true);
$postMethod->setParameter('words_to_exclude', ['read', 'great']);
$result = $postMethod->execute();
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'.
```

For PUT method:
```sh
$url = 'httpmirror.com/put/hello_world.html';
$putMethod = new Put($url);
$data = '<html><body><h1>Hello, World!</h1></body></html>';
$result = $putMethod->execute($data);
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'.
```

For HEAD method:
```sh
$url = 'http://www.httpmirror.com/head';
$headMethod = new Head($url);
$result = $headMethod->execute();
print_r($result); // Will print the array with keys 'status', 'time', 'header', and 'error'.
```

For OPTIONS method:
```sh
$url = 'http://www.example.com';
$optionsMethod = new Options($url);
$result = $optionsMethod->execute();
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'
```

License
----

MIT
