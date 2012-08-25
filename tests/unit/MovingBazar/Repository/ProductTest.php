<?php

use MovingBazar\Model\Product as ProductVO;

use MovingBazar\Repository\Product as ProductRepository;

/**
 * Product test case.
 */
class ProductTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Product
     */
    private $Product;

    protected function inject($object, $property, $value)
    {
        $ro = new \ReflectionObject($object);
        $property = $ro->getProperty($property);
        $property->setAccessible(true);
        $property->setValue($object, $value);
    }

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->Product = new ProductRepository;
        $this->inject($this->Product, 'productsPath', ROOT_PATH . 'tests/products/');

    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->Product = null;

        parent::tearDown();
    }

    /**
     * Tests Product->findAll()
     */
    public function testFindAll()
    {
        $firstProductVo = new ProductVO;
        $secondProductVo = clone $firstProductVo;
        $secondProductVo->setName("Personal computer")->setAmount(120.30)
                ->setQuantity(1)
                ->setDescription("Personal computer from unit test")
                ->setFullpath(
                        "/Users/kinncj/Documents/github/moving-bazar/tests/../tests/products/Computer")
                ->setPicture(
                        "/Users/kinncj/Documents/github/moving-bazar/tests/../tests/products/Computer/oldpc.jpeg");

        $expectedProducts = array($firstProductVo, $secondProductVo);
        $this->assertEquals($expectedProducts, $this->Product->findAll());

    }

    /**
     * Tests Product->findByName()
     */
    public function testFindByName()
    {
        $expectedProduct = new ProductVO;
        $expectedProduct->setName("Personal computer")->setAmount(120.30)
                ->setQuantity(1)
                ->setDescription("Personal computer from unit test")
                ->setFullpath(
                        "/Users/kinncj/Documents/github/moving-bazar/tests/../tests/products/Computer")
                ->setPicture(
                        "/Users/kinncj/Documents/github/moving-bazar/tests/../tests/products/Computer/oldpc.jpeg");

        $this->assertEquals($expectedProduct, $this->Product->findByName("Computer"));

    }

}

