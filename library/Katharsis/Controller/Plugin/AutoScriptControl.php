<?php
class Katharsis_Controller_Plugin_AutoScriptControl extends Katharsis_Controller_Plugin_Abstract
{
	public function preController()
	{
		$view = Katharsis_View::getInstance();
		
		$view->autoScriptFile = false;

		

		$scriptName = ucfirst(Katharsis_Request::getControllerName()) . '/' . strtolower(Katharsis_Request::getActionName());
		$autoScriptFile =  'scripts/DidgeridooArtwork/' . $scriptName . '.js';
		$sl = DIRECTORY_SEPARATOR;

		if(file_exists(getcwd() . $sl . str_replace('/', $sl, $autoScriptFile)))
		{
			$view->autoScriptFile = $view->base . '/' . $autoScriptFile;
		}
	}
}