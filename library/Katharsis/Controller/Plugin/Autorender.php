<?php
class Katharsis_Controller_Plugin_Autorender extends Katharsis_Controller_Plugin_Abstract
{
	public function postController()
	{
		$view = Katharsis_View::getInstance();
		
		$view->stageContent = false;

		$templateName = ucfirst(Katharsis_Request::getControllerName()) . DIRECTORY_SEPARATOR . strtolower(Katharsis_Request::getActionName());

		if(file_exists(getcwd() . '/application/view' . DIRECTORY_SEPARATOR . $templateName . '.phtml'))
		{
			$view->stageContent = $view->render($templateName);
		}

		echo $view->render('main');
	}
}
