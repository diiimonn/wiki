<?php
/**
 * The factory method pattern
 * is a creational pattern that uses factory methods to deal with the problem of creating objects
 * without having to specify the exact class of the object that will be created.
 */

namespace OOD\creational\factory_method;

/**
 * Class BaseProduct
 * @package OOD\creational\factory_method
 */
abstract class BaseProduct
{
    /**
     * @param string $class_name
     * @return BaseProduct
     */
    public static function createProduct(string $class_name): BaseProduct
    {
        return new $class_name();
    }

    /**
     * @return string
     */
    abstract public function getName(): string ;
}

/**
 * Class ProductOne
 * @package OOD\creational\factory_method
 */
class ProductOne extends BaseProduct
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
 * @package OOD\creational\factory_method
 */
class ProductTwo extends BaseProduct
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'ProductTwo';
    }
}


//Client

$product = BaseProduct::createProduct('OOD\creational\factory_method\ProductOne');
$product_name = $product->getName();

var_dump([$product, $product_name]);

$product = BaseProduct::createProduct('OOD\creational\factory_method\ProductTwo');
$product_name = $product->getName();

var_dump([$product, $product_name]);
