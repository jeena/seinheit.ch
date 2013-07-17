<?php
class PageController extends Katharsis_Controller_Abstract
{
	protected $_page;

	public function init()
	{
		$this->_page = new Page();
	}
	
	public function __call($method, $args) 
	{
		$preview = false;
		if(array_key_exists('preview', $this->_getAllParams()) && Access::isLoggedIn())
		{
			$preview = true;
		}

		$url = substr($method, 0, -6); // remove Action from urlAction
		
		$pageId = $this->_page->getIdByUrl($url, $preview);

		if(!$pageId) {
			throw new DidgeridooArtwork_Exception('Page konnte nicht geladen werden.');
		}

		$pageData = $this->_page->getPage($pageId);
		
		foreach($pageData as $key => $value) {
			$this->_view->{$key} = $value;
		}

		$this->_view->content = DidgeridooArtwork_Page_Plugin::render($this->_view->content);
		
		$content = $this->_view->render('Page/post');
		$this->_view->stageContent = $content;
		echo $this->_view->render('main');
		die();
	}
}