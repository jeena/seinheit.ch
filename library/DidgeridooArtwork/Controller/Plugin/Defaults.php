<?php
class DidgeridooArtwork_Controller_Plugin_Defaults extends Katharsis_Controller_Plugin_Abstract
{
	public function preController()
	{
		$ini = parse_ini_file('config/defaults.config.ini', true);
		$registry = Katharsis_Registry::getInstance();
		$registry->defaults = $ini;
		
		$view = Katharsis_View::getInstance();
		$view->defaults = $ini;
	}
}