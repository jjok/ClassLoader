<?php

/**
 * Copyright (c) 2013 Jonathan Jefferies
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 */

namespace jjok\ClassLoader;

/**
 * Class file autoloader.
 * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
 * @author Jonathan Jefferies (jjok)
 * @version 1.1.0
 */
class ClassLoader {
	
	/**
	 * Register the autoloader.
	 * @param string $throw
	 * @param string $prepend
	 * @return boolean
	 */
	public static function register($throw = true, $prepend = false) {
		return spl_autoload_register(array(__CLASS__, 'load'), $throw, $prepend);
	}
	
	/**
	 * Unregister the autoloader.
	 * @return boolean
	 */
	public static function unregister() {
		return spl_autoload_unregister(array(__CLASS__, 'load'));
	}
	
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
