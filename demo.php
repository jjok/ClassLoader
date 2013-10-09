<?php

// require_once 'src/jjok/ClassLoader/AbstractClassLoader.php';
require_once 'src/jjok/ClassLoader/ClassLoader.php';

set_include_path(get_include_path().PATH_SEPARATOR.'./tests/dummies');

jjok\ClassLoader\ClassLoader::register();

print_r(new Vendor\Dummy());
