<?php

class Singleton
{
    private $property;
    private static $_instance = null;
    private function __construct()
    {
        // приватный конструктор ограничивает реализацию getInstance()
    }

    protected function __clone()
    {
        // ограничивает клонирование объекта
    }

    private function __wakeup()
    {
        // ограничивает создание объекта после выполнения unserialize()
    }
    static public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function setProperty($val)
    {
        $this->property = $val;
    }

    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->property;
    }
}

class SingletonChild extends Singleton
{
}

// проверяем не создается ли второй экземпляр
$obj1 = Singleton::getInstance();
$obj2 = Singleton::getInstance();
$obj2->setProperty('object');
echo($obj1);




