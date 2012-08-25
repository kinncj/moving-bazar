<?php
namespace MovingBazar\Controller;
use MovingBazar\Repository\Product as ProductRepository;

class Product extends AbstractController
{
    public function get($name)
    {
    	$products = new ProductRepository;
    	$this->render('product/index.html', array('product'=> $products->findByName($name)));
    }
}