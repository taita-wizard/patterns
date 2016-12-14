<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 05.12.2016
 * Time: 14:01
 */

require_once "../../../vendor/autoload.php";
use Taita\Roxot\GameParser;

$parser = new GameParser(__DIR__ . "/source/matches/", __DIR__ . "/result/");
$parser->run();


