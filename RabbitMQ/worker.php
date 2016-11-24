<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 24.11.2016
 * Time: 10:48
 */
namespace Taita\AmqpWrapper;
require_once __DIR__ . '/../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
$connection = new AMQPStreamConnection('localhost', 5672, 'taita', 'qwerty12345');
$channel = $connection->channel();
$channel->queue_declare('task_queue', false, true, false, false);
//#queue name - Имя очереди может содержать до 255 байт UTF-8 символов
//#passive - может использоваться для проверки того, инициирован ли обмен, без того, чтобы изменять состояние сервера
//#durable - убедимся, что RabbitMQ никогда не потеряет очередь при падении - очередь переживёт перезагрузку брокера
//#exclusive - используется только одним соединением, и очередь будет удалена при закрытии соединения
//#autodelete - очередь удаляется, когда отписывается последний подписчик

echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

$callback = function($msg){
    echo " [x] Received ", $msg->body, "\n";
    sleep(substr_count($msg->body, '.'));

    echo " [x] Done", "\n";

    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};
$channel->basic_qos(null, 1, null);
$channel->basic_consume('task_queue', '', false, false, false, false, $callback);
//#очередь
//#тег получателя - Идентификатор получателя, валидный в пределах текущего канала. Просто строка
//#не локальный - TRUE: сервер не будет отправлять сообщения соединениям, которые сам опубликовал
//#без подтверждения - отправлять соответствующее подтверждение обработчику, как только задача будет выполнена
//#эксклюзивная - к очереди можно получить доступ только в рамках текущего соединения
//#не ждать - TRUE: сервер не будет отвечать методу. Клиент не должен ждать ответа
//#функция обратного вызова - метод, который будет принимать сообщение

while(count($channel->callbacks)) {
    $channel->wait();
}
$channel->close();
$connection->close();