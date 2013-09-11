<?php

namespace jjok\ClassLoader;

/**
 * Class file autoloader.
 * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
 * @author Jonathan Jefferies (jjok)
 * @version 1.0.0
 */
class ClassLoader {
	
	/**
	 * Include the file for the given class.
	 * @param string $class The fully-qualified name of the class to load.
	 */
	public static function load($class) {
		$parts = explode('\\', $class);
		
		# Support for non-namespaced classes.
		$parts[] = str_replace('_', DIRECTORY_SEPARATOR, array_pop($parts));
		
		$path = implode(DIRECTORY_SEPARATOR, $parts);
		
		$file = stream_resolve_include_path($path.'.php');
		if($file !== false) {
			require $file;
		}
	}
}
