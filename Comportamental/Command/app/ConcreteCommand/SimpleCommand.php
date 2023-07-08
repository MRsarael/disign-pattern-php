<?php

namespace App\ConcreteCommand;

use App\Contracts\Command;

/**
 * Concrete command
 */
class SimpleCommand implements Command
{
    private $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public function execute(): void
    {
        echo "SimpleCommand: Executando operação simples (" . $this->payload . ")\n";
        sleep(2);
    }
}



