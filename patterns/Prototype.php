<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 25.11.2016
 * Time: 16:40
 */

namespace taita\test;

/**
 * Какой-то продукт
 */
interface Product
{
}

/**
 * Какая-то фабрика
 */
class Factory
{

    /**
     * @var Product
     */
    private $product;


    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Возвращает новый продукт путём клонирования
     *
     * @return Product
     */
    public function getProduct()
    {
        return clone $this->product;
    }
}


class SomeProduct implements Product
{
    public $name;
}


$prototypeFactory = new Factory(new SomeProduct());

$firstProduct = $prototypeFactory->getProduct();
$firstProduct->name = 'The first product';

$secondProduct = $prototypeFactory->getProduct();
$secondProduct->name = 'Second product';

print_r($firstProduct->name);
// The first product
print_r($secondProduct->name);
// Second product
