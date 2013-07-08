<?php
class Navigation extends Katharsis_Model_Abstract
{
	public function init()
	{
	}
	
	public function getAllItems()
	{		
		$tidyResult = array();
		$result = $this->_con->fetchAll("SELECT * FROM navigation WHERE parent_id IS NULL ORDER BY sorting");
		foreach($result as $item)
		{
			$subSet = array();
			$sql = "SELECT * FROM navigation WHERE parent_id = :parentId ORDER BY sorting";
			$sql = $this->_con->createStatement($sql, array('parentId' => $item['id']));
			
			$item['children'] = $this->_con->fetchAll($sql);
			$tidyResult[] = $item;
		}
		return $tidyResult;
	}
	
	public function getMainItems()
	{		
		return $this->_con->fetchAll("SELECT id, name FROM navigation WHERE parent_id IS NULL ORDER BY sorting");
	}
	
	public function getItem($id)
	{
		if($id !== null)
		{
			$sql = "SELECT * FROM navigation WHERE id = :id";
			$sql = $this->_con->createStatement($sql, array('id' => $id));
			if(!$result = $this->_con->fetchOne($sql))
			{
				throw new DidgeridooArtwork_Exception('Item with this id not existent');
			}
		}
		else 
		{
			$sql = "SHOW COLUMNS FROM navigation";
			$res = $this->_con->fetchAll($sql);
			foreach($res as $it)
			{
				$result[$it['Field']] = ''; 
			}
		}
		
		return $result;
	}

	public function add()
	{		
	}
	
	public function delete($id)
	{
		$sql = "DELETE FROM navigation WHERE id = :id";
		$sql = $this->_con->createStatement($sql, array('id' => $id));
		$this->_con->run($sql);
	}
	
	public function move($direction, $id)
	{
		$sql = "SELECT sorting, parent_id FROM navigation WHERE id = :id";
		$sql = $this->_con->createStatement($sql, array('id' => $id));

		if($active = $this->_con->fetchOne($sql))
		{
			$parentPart = ($active['parent_id'] === null) ? "parent_id IS NULL" : "parent_id = :parentId"; 
			
			if($direction == 'up')
			{
				$sql = "SELECT id, sorting FROM navigation 
						WHERE 
						" . $parentPart . "
						AND sorting < :sorting
						ORDER BY sorting DESC
						LIMIT 1
						";
			} 
			else if($direction == 'down')
			{
				$sql = "SELECT id, sorting FROM navigation 
						WHERE 
						" . $parentPart . "
						AND sorting > :sorting
						ORDER BY sorting ASC
						LIMIT 1
						";
			} 
			else 
			{
				throw new DidgeridooArtwork_Exception('Wrong Direction');
			}
					
			$sql = $this->_con->createStatement($sql, array(':id' => $id, 'parentId' => $active['parent_id'], 'sorting' => $active['sorting']));
			
			$passiveItem = $this->_con->fetchOne($sql);
			
			//updating active item
			$sql = "UPDATE navigation SET sorting = :sorting WHERE id = :id";
			$sql = $this->_con->createStatement($sql, array('id' => $id, 'sorting' => $passiveItem['sorting']));
			$this->_con->run($sql);
	
			//updating passive item
			$sql = "UPDATE navigation SET sorting = :sorting WHERE id = :id";
			$sql = $this->_con->createStatement($sql, array('id' => $passiveItem['id'], 'sorting' => $active['sorting']));
			$this->_con->run($sql);
		} 
		else 
		{
			throw new DidgeridooArtwork_Exception('Wrong Parameters');
		}
	}
	
	public static function buildLink($base, $item, $simpleMode = false)
	{
		if($item['link'] !== null)
		{
			return $item['link'];
		}
		
		$link = $base . '/' . $item['controller'];
		if($simpleMode)
		{
			$link = $item['controller'];
		}
		
		if($item['action'] !== null)
		{
			$link .= '/' . $item['action'];
			
			if($simpleMode) return $link;
			
			if($item['controller'] == 'page')
			{
				$link .= '/preview';	
			}
		}
		
		return $link;
	}
	
	public static function getTitle()
	{
		
		if(substr(Katharsis_Request::getControllerName(), 0, 5) == 'admin')
		{
			return 'Admin';
		}
		
		$con = Katharsis_DatabaseConnector::getConnection();

		if(Katharsis_Request::getControllerName() == 'page')
		{
			$sql = "SELECT title FROM page WHERE url = :url";
			$sql = $con->createStatement($sql, array('url' => Katharsis_Request::getActionName()));
			if($field = $con->fetchField($sql))
			{
				return $field;
			}
		}
		
		$menuItemId = Katharsis_View::getInstance()->activeMenuItem;
		$sql = "SELECT name FROM navigation WHERE id = :menuItemId";
		$sql = $con->createStatement($sql, array('menuItemId' => $menuItemId));
		if($field = $con->fetchField($sql))
		{
			return $field;
		}
		
		return Katharsis_Registry::getInstance()->defaults['title'];
	}
	
	public static function getSubtitle()
	{
		$con = Katharsis_DatabaseConnector::getConnection();

		if(Katharsis_Request::getControllerName() == 'page')
		{
			$sql = "SELECT subtitle FROM page WHERE url = :url";
			$sql = $con->createStatement($sql, array('url' => Katharsis_Request::getActionName()));
			if($field = $con->fetchField($sql))
			{
				return $field;
			}
		}
		
		return Katharsis_Registry::getInstance()->defaults['subtitle'];
	}
	
	public function getSites()
	{
		$sql = "SELECT url FROM page";
		$sql = $this->_con->createStatement($sql, array('url' => Katharsis_Request::getActionName()));
		$sites = $this->_con->fetchAll($sql);
		
		foreach($sites as &$site)
		{
			$site = 'page/' . $site['url'];
		}
		$sites = array(
			'defaults' => explode(", ", Katharsis_Registry::getInstance()->defaults['sites']),
			'pages' => $sites
		);
		
		return $sites;
	}
	
	public function save($params)
	{
		$transformed = $this->_transformUrl($params['url'], $params['external']);
		
		$values = array(
			'id' => $params['id'],
			'name' => $params['name'],
			'parent_id' => $params['parentId'],
			'active' => $params['active']
		);
		
		$values = array_merge($values, $transformed);
				
		if(isset($values['id']) && is_numeric($values['id']))
		{
			$sql = "UPDATE navigation 
				SET 
					name = :name,
				 	controller = :controller,
				 	action = :action,
				 	link = :link,
				 	parent_id = parent_id,
				 	active = :active
				WHERE
					id = :id
			";
			$sql = $this->_con->createStatement($sql, $values);
			$this->_con->run($sql);
		} 
		else
		{
			if($values['parent_id'] === null)
			{
				$sql = "SELECT max(sorting) + 1 as maxi FROM `navigation` WHERE parent_id IS NULL";
			}
			else
			{
				$sql = "SELECT max(sorting) + 1 as maxi FROM `navigation` WHERE parent_id = :parentId";
				$sql = $this->_con->createStatement($sql, array('parentId' => $values['parent_id']));
			}
			
			
			$max = $this->_con->fetchField($sql);
			$max = ($max === null) ? 1 : $max;
			$values['sorting'] = $max;
			
			$this->_con->insert('navigation', $values);
		}
	}
	
	protected function _transformUrl($url, $external = null)
	{
		$values = array(
			'controller' => null,
			'action' => null,
			'link' => null
		);
		
		if($url == '-external-')
		{
			$values['link'] = $external;
			return $values;
		}
		
		$e = explode('/', $url);
		if(array_key_exists(1, $e))
		{
			$values['controller'] = $e[0];
			$values['action'] = $e[1];
		} 
		else
		{
			$values['controller'] = $url;
		}
		return $values;
	}
}