<?php
namespace MovingBazar\Controller;
use MovingBazar\Repository\Product as ProductRepository;

class Image extends AbstractController
{
    public function get($image)
    {
    	$image = base64_decode($image);
    	$finfo = new \finfo(FILEINFO_MIME);
    	$mime = $finfo->file($image);
    	header('Content-type: '.$mime);
    	$parts = explode(DIRECTORY_SEPARATOR, $image);
    	$lastPart = array_pop($image);
    	$path = implode(DIRECTORY_SEPARATOR, $parts);
    	$cacheImage = 'cache_'.$lastPart;
    	$cachePath = $path.'/'.$cacheImage;
    	if (!file_exists($cachePath)) {
    		$imagick = new \Imagick($image);
    		$imagick->resizeimage(289, 289, \Imagick::FILTER_LANCZOS, true);
    		$imagick->writeimage($cachePath);
    		$image = $cachePath;
    	}
    	readfile($image);
    	exit;
    }
}