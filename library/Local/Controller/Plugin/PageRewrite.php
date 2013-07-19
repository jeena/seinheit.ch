<?php
class Local_Controller_Plugin_PageRewrite extends Katharsis_Controller_Plugin_Abstract
{
	public function preController()
	{
		$defaultSites = array();
		if(isset(Katharsis_Registry::getInstance()->defaults['sites'])){
			$defaultSites = explode(", ", Katharsis_Registry::getInstance()->defaults['sites']);
		}

		$page = Katharsis_Request::getControllerName();

		if(!in_array($page, $defaultSites)) {
			Katharsis_Request::setControllerName('page');
			Katharsis_Request::setActionName($page);	
		}
	}
}