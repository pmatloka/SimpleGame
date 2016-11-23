<?php

/**
 * Simple class auto loader
 * Class ClassAutoLoader
 */
class ClassAutoLoader
{
	public static function autoload($class)
    {
	    $class = str_replace('\\', '/', $class);
		$filePath = 'src' . DIRECTORY_SEPARATOR . $class . '.php';
		if (file_exists($filePath)) {
			require_once($filePath);
		} else {
		  	throw new \RuntimeException("Class $class not found");
		}
	}
}

spl_autoload_register(array('ClassAutoLoader', 'autoload'));