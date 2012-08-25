<?php
namespace MovingBazar\Controller;
use MovingBazar\Repository\Product as ProductRepository;

class Page extends AbstractController
{
    public function get()
    {
    	$products = new ProductRepository;
    	$this->render('page/index.html', array('products'=> $products->findAll()));
    }
}