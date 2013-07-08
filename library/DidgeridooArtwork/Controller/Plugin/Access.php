<?php
class DidgeridooArtwork_Controller_Plugin_Access extends Katharsis_Controller_Plugin_Abstract
{
	public function preController()
	{
		if(Katharsis_Request::getControllerName() != 'admin')
		{
			$firstFive = substr(Katharsis_Request::getControllerName(), 0, 5);
			
			if($firstFive == 'admin' && !Access::isLogged())
			{
				Katharsis_Request::setControllerName('admin');
				Katharsis_Request::setActionName('index');
			}
		} 
	}
}