<?php
class DidgeridooArtwork_Controller_Plugin_Navigation extends Katharsis_Controller_Plugin_Abstract
{
	public function preController()
	{
		$view = Katharsis_View::getInstance();

		$navigation = new Navigation();
		$view->mainNavigationItems = $navigation->getAllItems();


		/*
		$sql = "SELECT id, name, controller, action, link FROM navigation WHERE parent_id IS NULL AND active = 1 ORDER BY sorting";
		$view->mainNavigationItems = $this->_con->fetchAll($sql);
		
		$sql = "SELECT id, parent_id, controller, action FROM navigation WHERE (action = :action AND controller = :controller) OR (action IS NULL AND controller = :controller)";
		$sql = $this->_con->createStatement($sql, array(
			'controller' => Katharsis_Request::getControllerName(), 
			'action' => Katharsis_Request::getActionName()
		));	
		
		if($row = $this->_con->fetchOne($sql))
		{
			$activeItemId = ($row['parent_id'] === null) ? $row['id'] : $row['parent_id'];
			
			$view->activeMenuItem = $activeItemId;
			
			$sql = "SELECT id, name, controller, action, link FROM navigation WHERE parent_id = :parentId ORDER BY sorting";
			$sql = $this->_con->createStatement($sql, array('parentId' => $activeItemId));
			$view->subNavigationItems = $this->_con->fetchAll($sql);
			
			if($row['parent_id'] !== null)
			{
				$view->activeSubMenuItem = $row['id'];
			}
			else 
			{
				$actionpart = ($row['action'] === null) ? ' action IS NULL ' : ' action = :action';
				$sql = "SELECT id FROM navigation WHERE controller = :controller AND " . $actionpart . " AND parent_id IS NOT NULL";
				$sql = $this->_con->createStatement($sql, array('controller' => $row['controller'], 'action' => $row['action']));
				$view->activeSubMenuItem = $this->_con->fetchField($sql);				
			}
		}*/
	}
}