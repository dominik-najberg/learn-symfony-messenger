<?php


namespace App\Controller;


use App\Message\SendNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Stamp\SerializerStamp;

class DefaultController extends AbstractController
{
    public function index(
        MessageBusInterface $commandBus,
        MessageBusInterface $eventBus
    )
    {
        $commandBus->dispatch(new SendNotification("Hey. I need to send this message...\n"));

        return new Response('<html><body><h1>OK</h1></body></html>');
    }
}