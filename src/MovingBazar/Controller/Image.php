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
    	readfile($image);
    	exit;
    }
}