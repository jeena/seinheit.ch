<?php
class Katharsis_DatabaseConnector
{
	public static $_conns = array();

	protected static function connect($requestedName = null)
	{
		$ini = parse_ini_file('config/database.config.ini', true);
		if($ini !== array())
		{
			$conInformation = self::_selectConnection($ini, $requestedName);
			return self::_realConnect($conInformation);
		} else
		{
			return null;
		}
	}

	public static function connectAll($requestedName = null)
	{
		$groups = parse_ini_file('config/database.config.ini',  true);

		foreach($groups as $iniName => $conInformation)
		{
			if(preg_match("~^connection:([^:]+)~", $iniName, $matches))
			{
				self::getConnection($matches[1]);
			}
		}
	}

	protected static function _realConnect($conInformation)
	{
		//$con = new PDO('mysql:host=' . $conInformation['host'] . ';dbname=' . $conInformation['database'], $conInformation['user'], $conInformation['password']);


		$con = new Katharsis_Db5($conInformation['host'], $conInformation['user'], $conInformation['password'], $conInformation['database']);

		self::$_conns[$conInformation['name']]['connection'] = $con;
		self::$_conns[$conInformation['name']]['info'] = $conInformation;

		return $con;
	}

	public static function getConnection($requestedName = null)
	{
		if($requestedName === null)
		{
			foreach(self::$_conns as $con)
			{
				if($con['info']['default'] === true)
				{
					return $con['connection'];
				}
			}
			return self::connect(null);
		} else
		{
			if(in_array($requestedName, array_keys(self::$_conns)))
			{
				return self::$_conns[$requestedName]['connection'];
			}
			return self::connect($requestedName);
		}
	}

	protected static function _selectConnection($ini, $requestedName = null)
	{
		foreach($ini as $name => $connectionInfo)
		{
			if($requestedName === null)
			{
				if(preg_match("~^connection:([^:]+):default~", $name, $matches))
				{
					$connectionInfo['name'] = $matches[1];
					$connectionInfo['default'] = true;
					return $connectionInfo;
				}
			} else
			{
				if(preg_match("~^connection:" . $requestedName . ".*~", $name))
				{
					$connectionInfo['default'] = false;
					$connectionInfo['name'] = $requestedName;
					return $connectionInfo;
				}
			}
		}
		throw new Katharsis_Exception('Could not find database connection information for "' . $requestedName . '"');
	}
}
?>