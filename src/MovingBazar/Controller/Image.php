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
    	if (!file_exists('/tmp'.$image)) {
    		$imagick = new \Imagick($image);
    		$imagick->resizeimage(289, 289, \Imagick::FILTER_LANCZOS, true);
    		$imagick->writeimage(ROOT_PATH.'cache/'.$image);
    		$image = ROOT_PATH.'cache/'.$image;
    	}
    	readfile($image);
    	exit;
    }
}