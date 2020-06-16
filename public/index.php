<?php
/**
 * Index File
 * Public central routing file
 *
 * @author Karl Pannek <info@katharsis.in>
 * @version 0.5.2
 * @package Katharsis
 */
 
chdir('..');
require_once('library/Katharsis/Bootstrap.php');
Katharsis_Autoload::init();

Katharsis_Controller_Plugin::registerPlugin(new DidgeridooArtwork_Controller_Plugin_Defaults());
Katharsis_Controller_Plugin::registerPlugin(new Local_Controller_Plugin_IndexRedirect());
Katharsis_Controller_Plugin::registerPlugin(new Local_Controller_Plugin_PageRewrite());
Katharsis_Controller_Plugin::registerPlugin(new DidgeridooArtwork_Controller_Plugin_SetNames());
Katharsis_Controller_Plugin::registerPlugin(new Katharsis_Controller_Plugin_StartSession());
Katharsis_Controller_Plugin::registerPlugin(new DidgeridooArtwork_Controller_Plugin_Notice());
Katharsis_Controller_Plugin::registerPlugin(new Katharsis_Controller_Plugin_Autorender());

Katharsis_Controller_Plugin::registerPlugin(new DidgeridooArtwork_Controller_Plugin_Access());
Katharsis_Controller_Plugin::registerPlugin(new DidgeridooArtwork_Controller_Plugin_Navigation());

try {
	Katharsis_Bootstrap::init();
	Katharsis_Bootstrap::run();
} catch(Exception $e)
{
	http_response_code(500);
	echo '<h2>Exception thrown</h2>';
	echo '<h3>' . $e->getMessage() . '</h3>';
	echo '<pre>';
	print_r($e);
}
