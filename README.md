ClassLoader
===========

[![Build Status](https://travis-ci.org/jjok/ClassLoader.png)](https://travis-ci.org/jjok/ClassLoader)

A simple [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md) class autoloader.

Usage
-----

1. Name your classes as in the PSR-0 [examples](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md#examples). 
2. Register the autoloader:

	try {
		jjok\ClassLoader\ClassLoader::register();
	}
	catch(Exception $e) {
		echo $e;
	}


Copyright (c) 2013 Jonathan Jefferies
