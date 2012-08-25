<?php
namespace MovingBazar\Controller;

class About extends AbstractController
{
    public function get()
    {
    	$this->render('about/index.html', array('about'=> file_get_contents(CONFIG_PATH.'about.ini')));
    }
}