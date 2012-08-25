<?php
namespace MovingBazar\Controller;

use MovingBazar\Model\Message;

class Contact extends AbstractController
{
    public function get()
    {
    	$id = md5(uniqid(mt_rand()));
    	$_SESSION['CSRF'] = $id;
    	$this->render('contact/index.html', array('csrf' => $id));
    }
    
    public function post()
    {
    	$mailSettings = (object) parse_ini_file(CONFIG_PATH.'email.ini');
    
    	if ($_POST['csrf'] != $_SESSION['CSRF']) {
    		$this->render('contact/error.html');
    		die();
    	}
    	
        $message = new Message();
        $message->setEmail($_POST['email'])
                ->setMessage($_POST['message'])
                ->setName($_POST['name'])
                ->setSubject($_POST['subject']);
    	switch($message->isValid()) {
    	    case true:
    	        mail($mailSettings->address, $mailSettings->subject, $message);
    	        $this->render('contact/success.html');
    	        break;
    	    default:
    	    	$this->render('contact/error.html');
    	    	break;
    	}
    }
}