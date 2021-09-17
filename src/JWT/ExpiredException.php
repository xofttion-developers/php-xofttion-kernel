<?php

namespace Xofttion\Kernel\JWT;

use UnexpectedValueException;
use stdClass;

class ExpiredException extends UnexpectedValueException
{

    // Atributos de la clase ExpiredException

    /**
     *
     * @var stdClass 
     */
    private $payload;

    // Constructor de la clase ExpiredException

    /**
     * 
     * @param string $message
     * @param stdClass|null $payload
     */
    public function __construct(string $message, ?stdClass $payload = null)
    {
        parent::__construct($message, 0, null);
        $this->setPayload($payload);
    }

    // Métodos de la clase ExpiredException

    /**
     * 
     * @param stdClass|null $payload
     * @return void
     */
    public function setPayload(?stdClass $payload): void
    {
        $this->payload = $payload;
    }

    /**
     * 
     * @return stdClass|null
     */
    public function getPayload(): ?stdClass
    {
        return $this->payload;
    }
}
