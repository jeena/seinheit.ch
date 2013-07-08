<?php
class Katharsis_Controller_Plugin_StartSession extends Katharsis_Controller_Plugin_Abstract
{
        public function preController()
        {
                session_write_close();
                session_start();
        }
}
?>