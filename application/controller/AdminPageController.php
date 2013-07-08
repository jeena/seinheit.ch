<?php
class AdminPageController extends Katharsis_Controller_Abstract
{
	protected $_page;

	public function init()
	{
		$this->_page = new Page();
	}

	public function indexAction()
	{
		$this->_view->pages = $this->_page->getPages();
	}
	
	public function editAction()
	{
		$this->_view->page = $this->_page->getPage($this->_getParam('pageId'));
	}

	public function imageAction()
	{
	
		if(isset($_FILES['myfile']))
		{
			$upload = new Upload();
						
			$upload->page($_FILES['myfile']);
			
			echo 'Das Hochladen war erfolgreich.<br><br>';
		} 

		
		if(isset($_GET['delete']))
		{
			$deleteFile = getcwd() . '/img/page/' . $_GET['delete'];
			if(file_exists($deleteFile)) {
				unlink($deleteFile);
			}
		}


		if ($handle = opendir(getcwd().'/img/page/')) 
		{
		    $ar = array();
		    while (false !== ($file = readdir($handle))) {
			if(is_dir($file)) continue;
		       $ar[] = $file;
		    }
			$this->_view->files = $ar;
		    closedir($handle);
		}

		echo $this->_view->render('AdminPage/image');
		die();
	}	

	public function saveAction()
	{
		$params = $this->_getAllParams();
		
		$params['active'] = 0;
		if($this->_getParam('active') && $this->_getParam('active') == 'on')
		{
			$params['active'] = 1;
		}

		$this->_page->save($params);
		DidgeridooArtwork_Notice::add('Page wurde erfolgreich gespeichert!');
		$this->_location('index');
	}
	
	public function deleteAction()
	{
		$this->_page->delete($this->_getParam('pageId'));
		DidgeridooArtwork_Notice::add('Page wurde erfolgreich gelöscht!');
		$this->_location('index');
	}
}
