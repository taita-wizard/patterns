<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 30.11.2016
 * Time: 10:42
 */

namespace taita\shelter;


class Shelter
{

    public function in(Animal $animal)
    {
        $animal->setName('name'.rand(1, 1000));
        $animal->setAge(rand(1, 20));
    }
}