<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 05.12.2016
 * Time: 14:01
 */
//echo("<xmp>");print_r(__DIR__);echo("</xmp>");die;
require_once __DIR__."/../../../vendor/autoload.php";

$parser = new \Taita\Roxot\GameParser();
echo $parser->display();


