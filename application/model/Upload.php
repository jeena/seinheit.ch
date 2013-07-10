<?php
class Upload extends Katharsis_Model_Abstract
{
	public function init()
	{
		
	}	

	public function header($file)
	{
		$dir = getcwd() . '/public/img/header';
		return $this->_uploadFile(null, $file, $dir);
	}

	public function page($file)
	{
		$dir = getcwd() . '/public/img/page';
		return $this->_uploadFile(null, $file, $dir, $file['name'] . '-' . time());
	}
	
	protected function _uploadFile($id, $file, $dir, $name = null)
	{
		if($name === null)
		{
			$name = time();
		} 
		else
		{
			if($nameparts = explode(".", $name))
			{
				$name = $nameparts[0];
			}
		} 
 
 		if (!is_dir($dir)) {
			mkdir($dir);
		}

        $typeAccepted = array("image/jpeg", "image/gif", "image/png");
        if(!in_array($file['type'], $typeAccepted)) {
        	throw new DidgeridooArtwork_Exception('Hochladen fehlgeschlagen. Dateityp nicht akzeptiert. Nur jpeg, gif und png möglich');
			return false;
        }

        $ext = '';
        switch($file['type']) {
        	case "image/jpeg":
        		$ext = '.jpg';
        		break;
        	case "image/gif":
        		$ext = '.gif';
        		break; 
        	case "image/png":
        		$ext = '.png';
        		break;
        }
 		
		if (!move_uploaded_file($file['tmp_name'], $dir . '/' . $name . $ext)) 
		{
			throw new DidgeridooArtwork_Exception('Hochladen fehlgeschlagen. (move_uploaded_file: false)');
			return false;
		}
		return $name . $ext;
	}
}