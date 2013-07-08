<?php
 class DidgeridooArtwork_Page_Plugin_MiniEventList extends DidgeridooArtwork_Page_Plugin_Abstract
{
	public function render($parameters)
	{
		$event = new Event();
		$this->_view->pluginEvents = $event->getEventList();

		return $this->_view->render('Plugin/minieventlist');
	}
}