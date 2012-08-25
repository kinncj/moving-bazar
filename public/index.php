<?php
require_once 'bootstrap.php';
use Respect\Rest\Router;


$router = new Router();
$router->get('/', 'MovingBazar\Controller\Page');
$router->get('/image/*', 'MovingBazar\Controller\Image');
$router->get('/product/*', 'MovingBazar\Controller\Product');

$router->run();