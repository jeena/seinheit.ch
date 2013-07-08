<?php
class Katharsis_Autoload
{
	protected static $_classLocations = array(
		'library',
		'application/controller',
		'application/model'
	);

	public static function init()
	{
		spl_autoload_register('Katharsis_Autoload::autoload');
	}

	public static function autoload($classname)
	{
		if($location = self::findClass($classname))
		{
			require_once $location;
			return;
		}
		
		throw new exception('Autoload: could not load class "' . $classname . '"');
	}
	
	public static function findClass($classname)
	{
		$name = str_replace("_", DIRECTORY_SEPARATOR, $classname);

		foreach(self::$_classLocations as $location)
		{
			if(file_exists($location . DIRECTORY_SEPARATOR . $name . ".php"))
			{
				return $location . DIRECTORY_SEPARATOR . $name . ".php";
			}
		}
		return false;
	}
}
?>