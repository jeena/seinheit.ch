<?php
class DidgeridooArtwork_Controller_Plugin_Notice extends Katharsis_Controller_Plugin_Abstract
{
	public function preController()
	{
		$view = Katharsis_View::getInstance();
		$view->notices = DidgeridooArtwork_Notice::get();
	}
}