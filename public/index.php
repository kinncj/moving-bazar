<?php
require_once 'bootstrap.php';
use Respect\Rest\Router;


$router = new Router();
$router->get('/', 'MovingBazar\Controller\Page');

$router->run();