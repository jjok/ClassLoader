<?php

require_once 'src/jjok/ClassLoader/ClassLoader.php';

use jjok\ClassLoader\ClassLoader;

class ClassLoaderTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * Register autoloader and append include path.
	 */
	public function setUp() {
		set_include_path(get_include_path().PATH_SEPARATOR.'./tests/dummies');
	}
	
	public function testNamespacedClassesCanBeLoaded() {
		$this->assertFalse(class_exists('Vendor\Dummy', false));
		$this->assertFalse(class_exists('Vendor\Dummy', true));
		ClassLoader::register();
		$this->assertTrue(class_exists('Vendor\Dummy', true));
		ClassLoader::unregister();
		
		$this->assertFalse(class_exists('Vendor\Package\Dummy', false));
		$this->assertFalse(class_exists('Vendor\Package\Dummy', true));
		ClassLoader::register();
		$this->assertTrue(class_exists('Vendor\Package\Dummy', true));
		ClassLoader::unregister();

		$this->assertFalse(class_exists('Vendor\Package\SubPackage\Dummy', false));
		$this->assertFalse(class_exists('Vendor\Package\SubPackage\Dummy', true));
		ClassLoader::register();
		$this->assertTrue(class_exists('Vendor\Package\SubPackage\Dummy', true));
		ClassLoader::unregister();
	}
	
	public function testLegacyClassesCanBeLoaded() {
		$this->assertFalse(class_exists('Dummy', false));
		$this->assertFalse(class_exists('Dummy', true));
		ClassLoader::register();
		$this->assertTrue(class_exists('Dummy', true));
		ClassLoader::unregister();
		
		$this->assertFalse(class_exists('Vendor_Dummy2', false));
		$this->assertFalse(class_exists('Vendor_Dummy2', true));
		ClassLoader::register();
		$this->assertTrue(class_exists('Vendor_Dummy2', true));
		ClassLoader::unregister();
		
		$this->assertFalse(class_exists('Vendor_Package_Dummy2', false));
		$this->assertFalse(class_exists('Vendor_Package_Dummy2', true));
		ClassLoader::register();
		$this->assertTrue(class_exists('Vendor_Package_Dummy2', true));
		ClassLoader::unregister();
		
		$this->assertFalse(class_exists('Vendor_Package_SubPackage_Dummy2', false));
		$this->assertFalse(class_exists('Vendor_Package_SubPackage_Dummy2', true));
		ClassLoader::register();
		$this->assertTrue(class_exists('Vendor_Package_SubPackage_Dummy2', true));
		ClassLoader::unregister();
	}
}
