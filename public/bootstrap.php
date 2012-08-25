<?php
use MovingBazar\Exception\MovingBazar as MovingBazarException;

if (!defined('__DIR__')) {
	define('__DIR__', dirname(__FILE__));
}

define('ROOT_PATH', __DIR__.'/../');
define('CONFIG_PATH', ROOT_PATH.'config/');
define('SRC_PATH', ROOT_PATH.'src/');
define('PUBLIC_PATH', ROOT_PATH.'public/');
define('CACHE_PATH', ROOT_PATH.'cache/');
define('PRODUCTS_PATH', ROOT_PATH.'products/');

define('DEBUG', false);
set_include_path(ROOT_PATH);

spl_autoload_register(
    function($className)
    {
    	$file = ROOT_PATH.'src/'.str_replace(array('\\', '_'), '/', $className).'.php';
    	require_once "{$file}";
    }
);