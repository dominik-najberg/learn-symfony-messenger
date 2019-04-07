<?php


namespace App\Middleware;


use App\Stamp\AuditStamp;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class AuditMiddleware implements MiddlewareInterface
{
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $message = $envelope->getMessage();

        if (null == $auditStamp = $envelope->last(AuditStamp::class)) {
            $envelope = $envelope->with( $auditStamp = new AuditStamp(uniqid()) );
        }

        try {
            echo sprintf('[%s] Started with the message "%s"'."\n", $auditStamp->getUuid(), get_class($message));

            return $stack->next()->handle($envelope, $stack);
        } finally {
            echo sprintf('[%s] Finished with the message "%s"'."\n", $auditStamp->getUuid(), get_class($message));
        }
    }
}