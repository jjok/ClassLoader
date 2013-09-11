ClassLoader
===========

[![Build Status](https://travis-ci.org/jjok/ClassLoader.png)](https://travis-ci.org/jjok/ClassLoader)

A simple PSR-0 class autoloader.

Usage
-----

Register the autoloader.

    if(!spl_autoload_register(array('jjok\ClassLoader\ClassLoader', 'load'), true)) {
        throw new \RuntimeException('Unable to register autoloader.');
    }

TODO
----

* Add `register` method to class.


Copyright (c) 2013 Jonathan Jefferies
