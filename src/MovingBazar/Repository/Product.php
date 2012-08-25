<?php
namespace MovingBazar\Repository;
use MovingBazar\Exception\MovingBazar as MovingBazarException;

use MovingBazar\Model\Product as ProductVO;

class Product
{

    protected $productsPath = PRODUCTS_PATH;

    public function findAll()
    {
        $products = new \DirectoryIterator($this->productsPath);
        $productsArray = array();
        foreach ($products as $product) {
            if ($product->getBasename() == '.'
                    || $product->getBasename() == '..') {
                continue;
            }
            $productsArray[] = $this->getProduct($this->productsPath.$product->getFilename());
        }
        return $productsArray;
    }

    public function findByName($name)
    {
        $productVO = $this->getProduct($this->productsPath . "{$name}");

        return $productVO;
    }

    protected function getProduct($directory)
    {
        $directoryPath = $directory;
        $directory = new \DirectoryIterator($directoryPath);
        $productVO = new ProductVO();
        $name = $directory->getBasename();
        $finfo = new \finfo(FILEINFO_MIME);
        foreach ($directory as $product) {
            if ($product->getBasename() == '.'
                    || $product->getBasename() == '..') {
                continue;
            }
            $fileName = $product->getFilename();
            $file = $directoryPath . "/{$fileName}";
            $mime = $finfo->file($file);

            if (strpos($mime, 'image/') !== false) {
                $image = $file;
                $productVO->setPicture($image);
            } elseif (strpos($mime, 'text/') !== false) {
                $properties = (object) parse_ini_file($file);
                $productVO->setAmount($properties->amount)
                        ->setName($properties->name)
                        ->setDescription($properties->description)
                        ->setQuantity($properties->quantity)
                        ->setFullpath($directoryPath);
            }
        }
        return $productVO;
    }
}
