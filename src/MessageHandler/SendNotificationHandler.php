<?php


namespace App\MessageHandler;


use App\Message\SendNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SendNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(SendNotification $message)
    {
        echo 'Sent message received: '. $message->getContent();
    }
}