<?php
class DidgeridooArtwork_Notice
{
	public static function add($notice)
	{
		if(!is_array($_SESSION['notices']))
		{
			$_SESSION['notices'] = array();
		}
		$_SESSION['notices'][] = $notice;
	}
	
	public static function get()
	{
		$notices = array();
		if(array_key_exists('notices', $_SESSION))
		{
			$notices = $_SESSION['notices'];
		}
		$_SESSION['notices'] = array();
		return $notices;
	}
}