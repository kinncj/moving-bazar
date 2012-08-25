<?php
namespace MovingBazar\Model;
class Message
{
    private $name;
    private $email;
    private $subject;
    private $message;
    private $isValid = true;
	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return the $subject
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * @return the $message
	 */
	public function getMessage() {
		return $this->message;
	}
	
	public function isValid()
	{
		return $this->isValid;
	}

	/**
	 * @param field_type $name
	 */
	public function setName($name) {
		$this->name = filter_var($name, FILTER_SANITIZE_STRING);
		return $this;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->isValid = false;
		}
		$this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
		return $this;
	}

	/**
	 * @param field_type $subject
	 */
	public function setSubject($subject) {
		$this->subject = filter_Var($subject, FILTER_SANITIZE_STRING);
		return $this;
	}

	/**
	 * @param field_type $message
	 */
	public function setMessage($message) {
		$this->message = filter_var($message, FILTER_SANITIZE_STRING);
		return $this;
	}

    public function __toString()
    {
    	$message = "Name: {$this->name}\n";
    	$message.= "Email: {$this->email}\n";
    	$message.= "Subject: {$this->subject}\n";
    	$message.= "Message: {$this->message}\n";
    	return $message;
    }
}