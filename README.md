PHP REST Client
=========
[![Build Status](https://travis-ci.org/softiciel/php-rest-client.svg?branch=master)](https://travis-ci.org/softiciel/php-rest-client)
[![Codacy Badge](https://www.codacy.com/project/badge/6db38b171c54491d866546f95a73312f)](https://www.codacy.com/app/jaen-medina/php-rest-client)
[![Code Climate](https://codeclimate.com/github/softiciel/php-rest-client/badges/gpa.svg)](https://codeclimate.com/github/softiciel/php-rest-client)

A PHP REST Client.


Version
----

0.1.0


Install with composer
--------------

Add the package dependency softiciel/php-rest-client in your composer.json
```sh
{
    "require": {
        "softiciel/php-rest-client": "0.3.0"
    }
}
```


How to use?
--------------

Just instantiate the method you want to execute. There is support for GET, POST, PUT HEAD, DELETE and OPTIONS methods.

For GET method:

```sh
$url = 'http://www.example.com';
$getMethod = new Get($url);
$result = $getMethod->execute();
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'.
```

For POST method:
```sh
$url = 'https://httpbin.org/post';
$postMethod = new Post($url);
$postMethod->setParameter('text', 'Read these tips to improve');
$result = $postMethod->execute();
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'.
```

For PUT method:
```sh
$url = 'https://httpbin.org/put';
$putMethod = new Put($url);
$data = 'Test data';
$result = $putMethod->execute($data);
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'.
```

For HEAD method:
```sh
$url = 'http://www.example.com';
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

For DELETE method:
```sh
$url = 'https://httpbin.org/DELETE';
$deleteMethod = new Delete($url);
$result = $deleteMethod->execute();
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'
```

For custom method:
```sh
$url = 'http://www.example.com';
$customMethod = new CustomMethod($url);
$result = $customMethod->execute('EXECUTE');
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'
```

You can also use the RestClient class:
```sh
$result = RestClient::execute([
    'method' => 'get',
    'url' => 'www.example.org'
]);
print_r($result); // Will print the array with keys 'status', 'time', 'header', 'body' and 'error'
```

License
----

MIT
