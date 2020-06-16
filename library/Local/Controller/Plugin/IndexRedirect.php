<?php
class Local_Controller_Plugin_IndexRedirect extends Katharsis_Controller_Plugin_Abstract
{
	public function preController()
	{
		if(Katharsis_Request::getControllerName() == 'index' && Katharsis_Request::getActionName() == 'index')
		{
			Katharsis_Request::setControllerName('page');
			Katharsis_Request::setActionName('home');
		} 
	}
}
