<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 24.11.2016
 * Time: 10:12
 */
namespace Taita\AmqpWrapper;
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;




$connection = new AMQPStreamConnection('localhost', 5672, 'taita', 'qwerty12345');

$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'Hello World!'\n";
$channel->close();
$connection->close();
