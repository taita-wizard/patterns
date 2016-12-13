<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 05.12.2016
 * Time: 14:01
 */
//interface Observer
//{
//    function onAdd(Match $match);
//}
//
//interface Observable
//{
//    function addItem(Item $item);
//}
//
//class Match implements Observable
//{
//    private $_items = [];
//
//    public function analyze()
//    {
//        foreach($this->_items as $obs) {
//            $obs->onAdd($this);
//        }
//    }
//
//    public function addItem(Item $item)
//    {
//        $this->_items []= $item;
//    }
//}
//
//class Item implements Observer
//{
//    public function onAdd(Match $match)
//    {
//
//        echo( "Customer has been added to the list \n" );
//    }
//}
//
//$ul = new Match();
//$ul->addItem( new Item() );
//
//
//$ul->analyze(  );

 //die;
require_once "vendor/autoload.php";
use Taita\Roxot\GameParser;

$parser = new GameParser(__DIR__ . "/source/matches/", __DIR__ . "/result/");
$parser->run();


