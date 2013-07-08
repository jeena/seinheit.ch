<?php
 class DidgeridooArtwork_Page_Plugin_Newsletter extends DidgeridooArtwork_Page_Plugin_Abstract
{
	public function render($parameters)
	{
		return $this->_view->render('Plugin/newsletter');
	}
}