<?php
 class DidgeridooArtwork_Page_Plugin_Base extends DidgeridooArtwork_Page_Plugin_Abstract
{
	public function render($params)
	{
		return $this->_view->base;
	}
}