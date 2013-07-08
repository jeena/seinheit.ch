<?php
 class DidgeridooArtwork_Page_Plugin_MiniNewsList extends DidgeridooArtwork_Page_Plugin_Abstract
{
	public function render($parameters)
	{
		$news = new News();
		$this->_view->pluginNews = $news->getActiveNews();
		return $this->_view->render('Plugin/mininewslist');
	}
}