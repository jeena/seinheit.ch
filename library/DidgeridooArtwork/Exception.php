<?php
class DidgeridooArtwork_Exception extends Katharsis_Exception
{
	protected $_important = false;
	
	public function __construct($message, $important = false)
	{
		$this->_important = $important;
		parent::__construct($message);
	}
	
	public function handle()
	{
		
	}
}