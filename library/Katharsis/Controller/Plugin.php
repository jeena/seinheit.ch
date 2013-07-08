<?php
class Katharsis_Controller_Plugin
{
	protected static $_plugins;

	public static function registerPlugin($object)
	{
		self::$_plugins[] = $object;
	}

	public static function preControllerHook()
	{
		foreach(self::$_plugins as $plugin)
		{
			$plugin->preController();
		}
	}

	public static function postControllerHook()
	{
		foreach(self::$_plugins as $plugin)
		{
			$plugin->postController();
		}
	}
}
?>