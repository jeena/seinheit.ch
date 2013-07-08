<?php
class Katharsis_View
{
	protected static $_instance = null;
	protected $_items = array();

	public static function getInstance()
	{
		if(self::$_instance === null)
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	protected function __construct()
	{
		$base = preg_replace('/(.+)\/[^\/]+/', '\1', $_SERVER['SCRIPT_NAME']);
        $this->_items['base'] = $base != $_SERVER['SCRIPT_NAME'] ? $base : '';
	}

	public function __get($name)
	{
		if(array_key_exists($name, $this->_items))
		{
			if(is_array($this->_items[$name]))
			{
				return (array) $this->_items[$name];
			}
			return $this->_items[$name];
		}
		return null;
	}

	public function __set($name, $value)
	{
		$this->_items[$name] = $value;
	}

	public function render($template)
	{
		ob_start();
		if(file_exists('application/view/' . $template . '.phtml'))
		{
			include('application/view/' . $template . '.phtml');
		}
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

	public function requestHook()
	{
	}
	
	public function _getParam($key)
	{
		$params = Katharsis_Request::getParams();
		if(array_key_exists($key,$params))
		{
			return $params[$key];
		}
		return null;
	}
	
	public function formatDate($date)
	{
		$date = explode("-", $date);
		return $date[2] . '.' . $date[1] . '.' . $date[0]; 
	}
}
?>