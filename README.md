ClassLoader
===========

A simple PSR-0 class autoloader.

    if(!spl_autoload_register(array('jjok\ClassLoader\ClassLoader', 'load'), true)) {
        throw new \RuntimeException('Unable to register autoload function.');
    }

