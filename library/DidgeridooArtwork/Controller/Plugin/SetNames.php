<?php
class DidgeridooArtwork_Controller_Plugin_SetNames extends Katharsis_Controller_Plugin_Abstract
{
	public function preController()
	{
		$view = Katharsis_View::getInstance();
		$sql = "SET NAMES utf8";
		
		$this->_con->run($sql);
	}
}