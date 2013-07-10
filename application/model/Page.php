<?php
class Page extends Katharsis_Model_Abstract
{
	public function init()
	{
	}	

	public function render($url, $preview)
	{
		$activeTerm = '';
		if(!$preview)
		{
			$activeTerm = 'AND active = 1';
		}
		$sql = $this->_con->createStatement("SELECT * FROM page WHERE url = :url " . $activeTerm, array("url" => $url));
		if($result = $this->_con->fetchOne($sql))
		{
			return $result['content'];
		}
		else
		{
			throw new DidgeridooArtwork_Exception('Die von Ihnen angeforderte Seite (Page) "' . $url . '" konnte nicht gefunden werden.');
		}
	}
	
	public function getPages()
	{
		$sql = "SELECT id, title, subtitle, url, active FROM page ORDER BY id";
		return $this->_con->fetchAll($sql);
	}
	
	public function getPage($pageId)
	{
		$default = $this->_con->getEmptyColumnArray('page');
		
		if($pageId === null) return $default;
	
		$sql = "SELECT * FROM page WHERE id = :pageId";
		$sql = $this->_con->createStatement($sql, array('pageId' => $pageId));
		
		if($result = $this->_con->fetchOne($sql))
		{
			return $result;
		}
		return $default;
	}
	
	public function save($params)
	{
		$values = array(
			'title' => $params['title'],
			'subtitle' => $params['subtitle'],
			'url' => $params['url'],
			'content' => $params['content'],
			'active' => $params['active'],
			'header_image' => $params['header_image']
		);
	
		if(isset($params['id']) && is_numeric($params['id']))
		{
			$values['id'] = $params['id'];
			$sql = "UPDATE page 
				SET 
					title = :title,
					subtitle = :subtitle,
					url = :url,
					content = :content,
					active = :active,
					header_image = :header_image
				WHERE
					id = :id
			";
			$sql = $this->_con->createStatement($sql, $values);
			$this->_con->run($sql);
		} 
		else
		{
			$this->_con->insert('page', $values);
		}
	}
	
	public function delete($pageId)
	{
		$sql = "DELETE FROM page WHERE id = :pageId";
		$sql = $this->_con->createStatement($sql, array('pageId' => (int) $pageId));
		$this->_con->run($sql);
	}
}
?>