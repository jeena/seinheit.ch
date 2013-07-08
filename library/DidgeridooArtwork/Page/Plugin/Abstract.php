<?php
abstract class DidgeridooArtwork_Page_Plugin_Abstract
{
	protected $_con;
	protected $_view;

	public final function __construct()
	{
		$this->_con = Katharsis_DatabaseConnector::getConnection();
		$this->_view = Katharsis_View::getInstance();
		$this->init();
	}

	public function init()
	{
	}
	
	abstract public function render($parameters);
}
