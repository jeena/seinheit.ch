<?php
abstract class Katharsis_Model_Abstract
{
	protected $_con;

	public final function __construct()
	{
		$this->_con = Katharsis_DatabaseConnector::getConnection();
		$this->init();
	}

	public function init()
	{
	}
}
?>