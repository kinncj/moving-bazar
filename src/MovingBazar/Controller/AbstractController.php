<?php
namespace MovingBazar\Controller;
use Respect\Rest\Routable;

abstract  class AbstractController  implements Routable
{
  protected $twig;
  
  public function __construct()
  {
      $this->createTwig();
  }
  
  public function  render($template, array $values = array())
  {
  	$template = $this->twig->loadTemplate($template);
  	echo $template->render($values);
  }
  
  private function createTwig()
  {
  	\Twig_Autoloader::register();
  	$loader = new \Twig_Loader_Filesystem(SRC_PATH.'MovingBazar/Templates/');
  	$twig = new \Twig_Environment($loader, 
  	    array(
            'cache' => CACHE_PATH,
  	    	'debug' => DEBUG
  	    )
  	);
  	$this->twig = $twig;
  }
}