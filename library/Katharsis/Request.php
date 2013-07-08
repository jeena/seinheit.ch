<?php
class Katharsis_Request
{
	protected static $_controller = null;
	protected static $_action = null;
	protected static $_params = array();

	public static function setControllerName($name)
	{
		self::$_controller = $name;
	}

	public static function setActionName($name)
	{
		self::$_action = $name;
	}

	public static function setParams($params)
	{
		foreach($_POST as $key => $value)
		{
			$params[$key] = $value;
		}
		self::$_params = $params;

	}

	public static function getControllerName()
	{
		return self::$_controller;
	}

	public static function getActionName()
	{
		return self::$_action;
	}


	public static function getParams()
	{
		return self::$_params;
	}
}
?>