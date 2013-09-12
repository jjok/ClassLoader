ClassLoader
===========

[![Build Status](https://travis-ci.org/jjok/ClassLoader.png)](https://travis-ci.org/jjok/ClassLoader)

A simple [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md) class autoloader.

Usage
-----

1. Name your classes as in the PSR-0 [examples](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md#examples). 
2. Register the autoloader:

        spl_autoload_register(array('jjok\ClassLoader\ClassLoader', 'load'));

        if(!spl_autoload_register(array('jjok\ClassLoader\ClassLoader', 'load'), true)) {
            throw new \RuntimeException('Unable to register autoloader.');
        }

TODO
----

* Add `AbstractClassLoader` class with `register` and `unregister` methods.


Copyright (c) 2013 Jonathan Jefferies
