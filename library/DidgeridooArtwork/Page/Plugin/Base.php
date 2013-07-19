<?php
 class DidgeridooArtwork_Page_Plugin_Base extends DidgeridooArtwork_Page_Plugin_Abstract
{
	public function render($after)
	{
		return $this->_view->base . '/' . $after;
	}
}