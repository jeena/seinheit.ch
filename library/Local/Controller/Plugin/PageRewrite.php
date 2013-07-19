<?php
class Local_Controller_Plugin_PageRewrite extends Katharsis_Controller_Plugin_Abstract
{
	public function preController()
	{
		$controller = Katharsis_Request::getControllerName();

		if($controller === 'page') {
			return;
		}

		if(substr($controller, 0, 5) === 'admin') {
			return;
		}

		$defaultSites = array();
		if(isset(Katharsis_Registry::getInstance()->defaults['sites'])){
			$defaultSites = explode(", ", Katharsis_Registry::getInstance()->defaults['sites']);
		}

		if(in_array($controller, $defaultSites)) {
			return;
		}

		Katharsis_Request::setControllerName('page');
		Katharsis_Request::setActionName($controller);
	}
}