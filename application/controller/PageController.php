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
		if(array_key_exists('preview', $this->_getAllParams()) && Access::isLogged())
		{
			$preview = true;
		}
		$method = substr($method, 0, -6); // remove Action from urlAction
		$content = $this->_page->render($method, $preview);
		
		$content = DidgeridooArtwork_Page_Plugin::render($content);
		
		$this->_view->stageContent = $content;
		echo $this->_view->render('main');
		die();
	}
}