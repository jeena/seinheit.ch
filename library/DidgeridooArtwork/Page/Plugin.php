<?php
class DidgeridooArtwork_Page_Plugin
{
	public static function render($content)
	{
		preg_match_all('~\{\@([^\}| ]*) ?([^\}]*)\}~', $content, $findings);

		foreach($findings[1] as $key => $item)
		{
			
			$instanceName = "DidgeridooArtwork_Page_Plugin_" . ucfirst($findings[1][$key]);
			if(!Katharsis_Autoload::findClass($instanceName))
			{
				throw new DidgeridooArtwork_Exception('PagePlugin ' . $instanceName . ' konnte nicht gefunden werden.', 1);
			}
			$object = new $instanceName;
			$plugincontent = (string) $object->render(trim($findings[2][$key]));
			
			
			$content = str_replace($findings[0][$key], $plugincontent, $content);
		}
		
		return $content;
	}
}