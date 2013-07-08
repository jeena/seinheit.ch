<?php
class AdminUploadController extends Katharsis_Controller_Abstract
{
	public function indexAction()
	{
	}

	public function productAction()
	{
		$shop = new Product();
		$this->_view->item = $shop->getProduct($this->_getParam('productId')); 
	}
	
	public function processAction()
	{
		$upload = new Upload();
		
		if($this->_getParam('productId'))
		{
			if($_FILES['small']['type'] != $_FILES['big']['type'])
			{
				throw new DidgeridooArtwork_Exception('Beide Bilder müssen vom selben Dateityp sein.');
			}
			
			$filename = $upload->product($this->_getParam('productId'), $_FILES);
			$product = new Product();
			$product->addImage($this->_getParam('productId'), $filename);

			DidgeridooArtwork_Notice::add('Das Hochladen war erfolgreich.');
			$this->_location('edit', 'adminShop', array('productId' => $this->_getParam('productId')));
		} 
	}
}