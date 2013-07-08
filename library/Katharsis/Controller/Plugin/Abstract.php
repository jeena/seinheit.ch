<?php
abstract class Katharsis_Controller_Plugin_Abstract
{
	protected $_con;
	
	public function __construct()
	{
		$this->_con = Katharsis_DatabaseConnector::getConnection();
	}
	
	public function preController()
	{
	}

	public function postController()
	{
	}
}
?>