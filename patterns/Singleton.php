<?php
namespace taita\test;

trait Common
{
    private $property;
    private static $_instance = null;

    private function __clone()
    {
        // ограничивает клонирование объекта
    }

    private function __sleep()
    {
        // cериализация запрещена
    }

    private function __wakeup()
    {
        // ограничивает создание объекта после выполнения unserialize()
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

final class Singleton
{
    use Common;

    private function __construct()
    {
        echo __METHOD__ . ' called' . PHP_EOL;
        // приватный конструктор ограничивает реализацию getInstance()
    }

    static public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
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

// проверяем __clone()
// FATAL ERROR Uncaught Error: Call to protected Singleton::__clone() from context ''
//$obj4 = clone $obj1;
//$obj4->setProperty('value4');
//echo $obj4 . PHP_EOL;

// проверяем __wakeup()
// WARNING: Invalid callback Singleton::__wakeup, cannot access private method Singleton::__wakeup()
//$obj5 = unserialize(serialize($obj1));
//echo $obj5 . PHP_EOL;

// проверяем __sleep()
// WARNING: Invalid callback Singleton::__sleep, cannot access private method Singleton::__sleep() in
//$obj6 = serialize($obj1);
//echo $obj6 . PHP_EOL;

// проверяем __construct()
// FATAL ERROR Uncaught Error: Call to private Singleton::__construct() from invalid context in
//$obj6 = new Singleton();

// для позднего статического связывания
class Singleton2
{
    use Common;
    protected function __construct()
    {
        echo __METHOD__ . ' called' . PHP_EOL;
        // приватный конструктор ограничивает реализацию getInstance()
    }

    static public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }
}

class SingletonChild extends Singleton2
{
    protected function __construct()
    {
        echo __METHOD__ . ' called' . PHP_EOL;
    }
}

echo "<xmp>";
// проверяем экземпляр родительского класса
$obj10 = SingletonChild::getInstance();
$obj10->setProperty('value10');
echo get_class($obj10) . PHP_EOL;
echo $obj10 . PHP_EOL;
// taita\test\SingletonChild::__construct called
// taita\test\SingletonChild
// value10
