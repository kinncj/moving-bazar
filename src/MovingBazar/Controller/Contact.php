<?php
namespace MovingBazar\Controller;

use MovingBazar\Model\Message;

class Contact extends AbstractController
{
    public function get($name)
    {
    	$this->render('contact/index.html');
    }
    
    public function post()
    {
    	$mailSettings = (object) parse_ini_file(CONFIG_PATH.'email.ini');
    
        $message = new Message();
        $message->setEmail($_POST['email'])
                ->setMessage($_POST['message'])
                ->setName($_POST['name'])
                ->setSubject($_POST['subject']);
    	switch($message->isValid()) {
    	    case true:
    	        mail($mail->address, $mail->subject, $message);
    	        $this->render('contact/success.html');
    	        break;
    	    default:
    	    	$this->render('contact/error.html');
    	    	break;
    	}
    }
}