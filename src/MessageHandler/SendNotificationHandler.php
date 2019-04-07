<?php


namespace App\MessageHandler;


use App\Message\SendNotification;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

class SendNotificationHandler implements MessageSubscriberInterface
{
    public static function getHandledMessages(): iterable
    {
        yield SendNotification::class => ['bus' => 'messenger.bus.commands'];
        yield SendNotification::class => ['bus' => 'messenger.bus.events'];
    }

    public function __invoke(SendNotification $message)
    {
        echo 'Sent message received: '. $message->getContent();
    }
}