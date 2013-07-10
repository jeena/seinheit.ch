<?php
 class DidgeridooArtwork_Page_Plugin_Image extends DidgeridooArtwork_Page_Plugin_Abstract
{
	public function render($imgName)
	{
		return $this->_view->base . "/img/page/" . $imgName;
	}
}