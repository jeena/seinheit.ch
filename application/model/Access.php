<?php
class Access extends Katharsis_Model_Abstract
{
	public function init()
	{
	}	

	public static function isLoggedIn()
	{
		if(isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
		{
			return true;
		}
		return false;
	}
}
