<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 30.11.2016
 * Time: 9:45
 */

namespace taita\shelter;


class Animal
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var integer
     */
    private $age;

    /**
     * Animal constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function sendShelter()
    {
        Shelter::newAnimal();
    }

}

$cat = new Cat();
$cat->sendShelter();