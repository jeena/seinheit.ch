<?php
abstract class Katharsis_Controller_Abstract
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

	public function __call($action, $params)
	{
		throw new Katharsis_Exception('Die von Ihnen angeforderte Seite (Action) "' . substr($action, 0, -6) . '" konnte nicht gefunden werden.');
	}

	protected function _getParam($key)
	{
		$params = Katharsis_Request::getParams();
		if(array_key_exists($key,$params))
		{
			return $params[$key];
		}
		return null;
	}

	protected function _getAllParams()
	{
		return Katharsis_Request::getParams();
	}

	protected function _location($action, $controller = null, $getParams = null)
	{
		if($controller === null)
		{
			$controller = Katharsis_Request::getControllerName();
		}

		$paramstring = "";
		if($getParams !== null)
		{
			foreach($getParams as $key => $value)
			{
				$paramstring .= "/" . (string) $key . "/" . (string) $value;
			}
		}

		header("location: " . $this->_view->base . "/" . $controller . "/" . $action . $paramstring);
	}
}
?>