<?php
class Upload extends Katharsis_Model_Abstract
{
	public function init()
	{
		
	}	

	public function header($id, $file)
	{
		$dir = getcwd() . '/img/header';
		return $this->_uploadFile($id, $file, $dir);
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