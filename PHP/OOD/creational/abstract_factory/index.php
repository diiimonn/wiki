<?php
/**
 * Creates groups of related objects
 */

namespace OOD\creational\abstract_factory;


/**
 * Interface IProduct
 * @package OOD\creational\abstract_factory
 */
interface IProduct
{
    /**
     * @return string
     */
    public function getName(): string ;
}

/**
 * Class ProductOne
 * @package OOD\creational\abstract_factory
 */
class ProductOne implements IProduct
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'ProductOne';
    }
}

/**
 * Class ProductTwo
 * @package OOD\creational\abstract_factory
 */
class ProductTwo implements IProduct
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'ProductTwo';
    }
}

/**
 * Interface AbstractFactory
 * @package OOD\creational\abstract_factory
 */
interface AbstractFactory
{
    /**
     * @return IProduct
     */
    public function getProductOne(): IProduct;

    /**
     * @return IProduct
     */
    public function getProductTwo(): IProduct;
}

/**
 * Class FirstFactory
 * @package OOD\creational\abstract_factory
 */
class FirstFactory implements AbstractFactory
{
    /**
     * @return IProduct
     */
    public function getProductOne(): IProduct
    {
        return new ProductOne();
    }

    /**
     * @return IProduct
     */
    public function getProductTwo(): IProduct
    {
        return new ProductTwo();
    }
}



//Client

$factory = new FirstFactory();

$product_one = $factory->getProductOne();
$product_one_name = $product_one->getName();

$product_two = $factory->getProductTwo();
$product_two_name = $product_two->getName();

var_dump([$factory, $product_one_name, $product_two_name]);
