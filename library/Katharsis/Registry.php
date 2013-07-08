<?php
/**
 * Katharsis Registry
 * Global data pool
 *
 * @author Karl Pannek <info@katharsis.in>
 * @version 0.5.2
 * @package Katharsis
 */
class Katharsis_Registry
{
	/**
	 * @var Katharsis_Registry
	 */
	protected static $_instance = null;
	
	/**
	 * @var array
	 */
	protected $_params = array();

	/**
	 * Singleton. Returns the same instance every time
	 * 
	 * @return Katharsis_Registry
	 */
	public static function getInstance()
	{
		if(self::$_instance === null)
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Magical get method, gets specific param
	 *
	 * @param string $name
	 * @return string
	 */
	public function __get($name)
	{
		if(array_key_exists($name, $this->_params))
		{
			return $this->_params[$name];
		}
		return null;
	}

	/**
	 * Magical set method, sets specific param
	 *
	 * @param string name
	 * @param string value
	 */
	public function __set($name, $value)
	{
		$this->_params[$name] = $value;
	} 
	
	public function getAll()
	{
		return $this->_params;
	}
}