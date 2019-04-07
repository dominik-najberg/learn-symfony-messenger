<?php


namespace App\Stamp;


use Symfony\Component\Messenger\Stamp\StampInterface;

class AuditStamp implements StampInterface
{
    private $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }
}