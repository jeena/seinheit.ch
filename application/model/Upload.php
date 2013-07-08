<?php
class Upload extends Katharsis_Model_Abstract
{
	public function init()
	{
		
	}	
	
	public function product($id, $files)
	{
		$dir = getcwd() . '/img/shop/product';
		
		$name = $this->_uploadFile($id, $files['small'], $dir . '/small');
		$this->_uploadFile($id, $files['big'], $dir . '/big', $name);
		
		return $name;
	}
	
	public function category($id, $file)
	{
		$dir = getcwd() . '/img/shop/category';
		return $this->_uploadFile($id, $file, $dir);
	}
	
	public function sound($id, $file)
	{
		$dir = getcwd() . '/sound';
		return $this->_uploadFile($id, $file, $dir);
	}
	
	public function event($id, $files)
	{
		$dir = getcwd() . '/img/event';
		
		$name = $this->_uploadFile($id, $files['image'], $dir);
		$this->_uploadFile($id, $files['image_full'], $dir . '/full', $name);

		return $name;
	}

	public function page($file)
	{
		$dir = getcwd() . '/img/page';
		return $this->_uploadFile(null, $file, $dir, $file['name'] . '-' . time());
	}
	
	protected function _uploadFile($id, $file, $dir, $name = null)
	{
		if($name === null)
		{
			$name = $id . '-' . time();
		} 
		else
		{
			if($nameparts = explode(".", $name))
			{
				$name = $nameparts[0];
			}
		} 

		$handle = new Verot_Upload($file);
		$handle->file_new_name_body = $name;
		if ($handle->uploaded) 
		{
			$handle->Process($dir);
			if (!$handle->processed) 
			{
				throw new DidgeridooArtwork_Exception('Datei konnte nicht verschoben werden (' . $handle->error . ').');
			}
			$handle->Clean();
		}
		else
		{
			throw new DidgeridooArtwork_Exception('Datei konnte nicht hochgeladen werden (' . $handle->error . ').');
		}
		$returnName = $handle->file_dst_name;
		return $returnName;
	}
}