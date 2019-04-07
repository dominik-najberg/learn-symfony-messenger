<?php


namespace App\Middleware;


use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class AuditMiddleware implements MiddlewareInterface
{
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $message = $envelope->getMessage();

        try {
            echo sprintf('Started with the message "%s"'. "\n", get_class($message));

            return $stack->next()->handle($envelope, $stack);
        } finally {
            echo sprintf('Finished with the message "%s"'. "\n", get_class($message));
        }
    }
}