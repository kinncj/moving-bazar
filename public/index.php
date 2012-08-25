<?php
use Respect\Rest\Router;

require_once 'bootstrap.php';
$router = new Router();
$router->get('/', 'MovingBazar\Controller\Page');

$router->run();