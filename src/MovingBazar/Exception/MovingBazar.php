<?php
namespace MovingBazar\Exception;
class MovingBazar extends \Exception
{
    public function __construct($message = null, $code = null, $previous = null)
    {
    	$message = "[Moving Bazar][Exception]{$message}";
    	error_log($message, 0);
    	parent::__construct($message, $code, $previous);
    }
}