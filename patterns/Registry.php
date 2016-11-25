<?php

/**
 * Created by PhpStorm.
 * User: yury
 * Date: 25.11.2016
 * Time: 10:54
 */
class Registry
{
    /**
     * @var mixed[]
     */
    protected static $_data = [];


    /**
     * Добавляет значение в реестр
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set($key, $value)
    {
        self::$_data[$key] = $value;
    }

    /**
     * Возвращает значение из реестра по ключу
     *
     * @param string $key
     * @return mixed
     */
    public static function get($key)
    {
        return isset(self::$_data[$key]) ? self::$_data[$key] : null;
    }

    /**
     * Удаляет значение из реестра по ключу
     *
     * @param string $key
     * @return void
     */
    final public static function remove($key)
    {
        if (array_key_exists($key, self::$_data)) {
            unset(self::$_data[$key]);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode(self::$_data);
    }
}

echo "<xmp>";
Registry::set('product1', 'value1');
echo Registry::get('product1') . PHP_EOL;
// value1

Registry::remove('product1');
var_dump(Registry::get('product1'));
// NULL

$obj = new Registry();
$obj::set('product1', 'value1');
$obj::set('product2', 'value2');
echo $obj . PHP_EOL;
// {"product1":"value1","product2":"value2"}

$obj::remove('product2');
echo $obj::get('product1') . PHP_EOL;
echo $obj;
// value1
// {"product1":"value1"}


