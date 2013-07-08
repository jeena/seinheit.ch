<?php
class AdminController extends Katharsis_Controller_Abstract
{
	public function indexAction()
	{
		if(!Access::isLogged()) $this->_location('gate');
	}
	
	public function gateAction()
	{
	}
	
	public function loginAction()
	{
		if($this->_getParam('password') == $this->getPassword())
		{
			$_SESSION['logged'] = 1;
			$this->_location('index');
		} 
		else
		{
			$this->_location('gate', null, array('wrongpassword' => ''));
		}
		
	}
	
	public function logoutAction()
	{
		$_SESSION['logged'] = 0;
		$this->_location('gate');
	}

	// Private

	private function getPassword()
	{
		$admin_ini = parse_ini_file('config/admin.ini');
		$password = $admin_ini["password"];

		return $password;
	}
}