<?php
class AdminNavigationController extends Katharsis_Controller_Abstract
{
	protected $_navi;
	
	public function init()
	{
		$this->_navi = new Navigation();
	}
	
	public function indexAction()
	{
		$this->_view->list = $this->_navi->getAllItems();
	}
	
	public function editAction()
	{
		$this->_view->mainItems = $this->_navi->getMainItems();
		$this->_view->item = $this->_navi->getItem($this->_getParam('id'));
		$this->_view->sites = $this->_navi->getSites();
	}
	
	public function deleteAction()
	{
		$this->_navi->delete($this->_getParam('id'));
		DidgeridooArtwork_Notice::add('Navigationseintrag wurde erfolgreich gelöscht!');
		$this->_location('index');
	}
	
	public function saveAction()
	{
		$params = $this->_getAllParams();
		
		$params['active'] = 0;
		if($this->_getParam('active') && $this->_getParam('active') == 'on')
		{
			$params['active'] = 1;
		}
		
		$params['parentId'] = ($params['parentId'] == '0') ? null : $params['parentId'];

		$this->_navi->save($params);
		DidgeridooArtwork_Notice::add('Navigationseintrag wurde erfolgreich gespeichert!');
		$this->_location('index');
	}
	
	public function moveAction()
	{
		$this->_navi->move($this->_getParam('direction'), $this->_getParam('id'));
		DidgeridooArtwork_Notice::add('Navigationseintrag wurde erfolgreich verschoben!');
		$this->_location('index');
	}
}
