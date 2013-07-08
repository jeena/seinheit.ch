<?php
class DidgeridooArtwork_Page_Plugin
{
	public static function render($content)
	{
		preg_match_all("~\{plugin\=([^\}| ]*)([^\}]*)~", $content, $findings);
		
		$findings[1] = array_reverse($findings[1]);
		$findings[2] = array_reverse($findings[2]);
		
		foreach($findings[1] as $key => $item)
		{
			$instanceName = "DidgeridooArtwork_Page_Plugin_" . ucfirst($findings[1][$key]);
			if(!Katharsis_Autoload::findClass($instanceName))
			{
				throw new DidgeridooArtwork_Exception('PagePlugin ' . $instanceName . ' konnte nicht gefunden werden.', 1);
			}
			$object = new $instanceName;
			$plugincontent = (string) $object->render(trim($findings[2][$key]));
			
			$content = preg_replace("~(.*)\{plugin\=" . $findings[1][$key] . "[^\}]*\}(.*)~", '${1}' . $plugincontent . '${2}', $content);
		}
		
		return $content;
	}
}