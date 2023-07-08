<?php

namespace App\ConcreteCommand;

use App\Contracts\Command;
use App\Receiver;

/**
 * Concrete command
 */
class ComplexCommand implements Command
{
    /**
     * @var Receiver
     */
    private $receiver;
    private $a;
    private $b;

    /**
     * Comandos complexos podem aceitar um ou vários objetos receptores junto com
     * quaisquer dados de contexto por meio do construtor.
     */
    public function __construct(Receiver $receiver, string $a, string $b)
    {
        $this->receiver = $receiver;
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * Delegando funcionalidades para o Receiver
     */
    public function execute(): void
    {
        echo "ComplexCommand: Executando operação complexa.\n";
        $this->receiver->doSomething($this->a);
        $this->receiver->doSomethingElse($this->b);
    }
}

