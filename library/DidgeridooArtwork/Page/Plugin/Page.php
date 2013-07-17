<?php
 class DidgeridooArtwork_Page_Plugin_Page extends DidgeridooArtwork_Page_Plugin_Abstract
{
	public function render($pageName)
	{
		return $this->_view->base . "/page/" . $pageName;
	}
}