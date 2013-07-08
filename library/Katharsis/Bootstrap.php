<?php
require_once('library/Katharsis/Autoload.php');

class Katharsis_Bootstrap
{
	public static function init()
	{
		$router = Katharsis_ControllerRouting::getInstance();
		$router->init();
	}
	
	public static function run()
	{
		$router = Katharsis_ControllerRouting::getInstance();

		Katharsis_Controller_Plugin::preControllerHook();

		$router->route();

		Katharsis_Controller_Plugin::postControllerHook();
	}
}
?>