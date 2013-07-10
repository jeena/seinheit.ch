<?php
class AdminUploadController extends Katharsis_Controller_Abstract
{
	public function indexAction()
	{
	}
	
	public function headerAction()
	{
		$upload = new Upload();
		
			$filename = $upload->header($this->_getParam('pageId'), $_FILES);

			DidgeridooArtwork_Notice::add('Das Hochladen war erfolgreich. Dateiname: ' . $filename);
	}
}