<?php

define("HOST", "localhost");
define("PORT", "3306");
define("DB_NAME", "zf");
define("DB_USER", "root");
define("DB_PASS", "");

define("DB_DSN", "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DB_NAME . ";charset=UTF8");

final class DB
{
    private static $objInstance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    private function __sleep()
    {
    }

    public static function getInstance()
    {
        if (!self::$objInstance) {
            self::$objInstance = new PDO(DB_DSN, DB_USER, DB_PASS);
            self::$objInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$objInstance;
    }

    final public static function __callStatic($chrMethod, $arrArguments)
    {
        $objInstance = self::getInstance();
        return call_user_func_array(array($objInstance, $chrMethod), $arrArguments);
    }

}

?>