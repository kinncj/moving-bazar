<?php
namespace MovingBazar\Controller;

class About extends AbstractController
{
    public function get($name)
    {
    	$this->render('about/index.html', array('about'=> (object) parse_ini_file(CONFIG_PATH.'about.ini')));
    }
}