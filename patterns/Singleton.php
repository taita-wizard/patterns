<?php

class Singleton
{
    private $property;
    private static $_instance = null;

    private function __construct()
    {
        echo __METHOD__ . ' called' . PHP_EOL;
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
    private function __construct()
    {
        echo __METHOD__ . ' called<br/>';
    }
}

echo "<xmp>";
// проверяем не создается ли второй экземпляр
$obj1 = Singleton::getInstance();
$obj1->setProperty('value1');
echo $obj1 . PHP_EOL;
// value1

$obj2 = Singleton::getInstance();
$obj2->setProperty('value2');
echo $obj1 . PHP_EOL;
echo $obj2 . PHP_EOL;
// value2
// value2

// проверяем экземпляр родительского класса
$obj3 = SingletonChild::getInstance();
$obj3->setProperty('value3');
echo $obj1 . PHP_EOL;
echo $obj2 . PHP_EOL;
echo $obj3 . PHP_EOL;
// value3
// value3
// value3

// проверяем __clone()
// FATAL ERROR Uncaught Error: Call to protected Singleton::__clone() from context ''
//$obj4 = clone $obj1;
//$obj4->setProperty('value4');
//echo $obj4 . PHP_EOL;

// проверяем __wakeup()
// WARNING: Invalid callback Singleton::__wakeup, cannot access private method Singleton::__wakeup()
//$obj5 = unserialize(serialize($obj1));
//echo $obj5 . PHP_EOL;

// проверяем __construct()
// FATAL ERROR Uncaught Error: Call to private Singleton::__construct() from invalid context in
//$obj6 = new Singleton();


