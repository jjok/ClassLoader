<?php

require_once 'src/jjok/ClassLoader/ClassLoader.php';

class ClassLoaderTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * Register autoloader and append include path.
	 */
	public function setUp() {
		spl_autoload_register(array('jjok\ClassLoader\ClassLoader', 'load'));
		set_include_path(get_include_path().PATH_SEPARATOR.'./tests/dummies');
	}
	
	public function testNamespacedClassesCanBeLoaded() {
		$this->assertFalse(class_exists('Vendor\Dummy', false));
		$this->assertTrue(class_exists('Vendor\Dummy', true));
		
		$this->assertFalse(class_exists('Vendor\Package\Dummy', false));
		$this->assertTrue(class_exists('Vendor\Package\Dummy', true));

		$this->assertFalse(class_exists('Vendor\Package\SubPackage\Dummy', false));
		$this->assertTrue(class_exists('Vendor\Package\SubPackage\Dummy', true));
	}
	
	public function testLegacyClassesCanBeLoaded() {
		$this->assertFalse(class_exists('Dummy', false));
		$this->assertTrue(class_exists('Dummy', true));
		
		$this->assertFalse(class_exists('Vendor_Dummy2', false));
		$this->assertTrue(class_exists('Vendor_Dummy2', true));
		
		$this->assertFalse(class_exists('Vendor_Package_Dummy2', false));
		$this->assertTrue(class_exists('Vendor_Package_Dummy2', true));
		
		$this->assertFalse(class_exists('Vendor_Package_SubPackage_Dummy2', false));
		$this->assertTrue(class_exists('Vendor_Package_SubPackage_Dummy2', true));
	}
}
