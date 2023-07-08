<?php

namespace App;

use App\Contracts\State;

/**
 * Context define a interface de interesse dos clientes.
 */
class Context
{
    /**
     * @var State Estado atual de Context
     */
    private $state;

    public function __construct(State $state)
    {
        $this->transitionTo($state);
    }

    /**
     * Altera o objeto State em tempo de execução.
     */
    public function transitionTo(State $state): void
    {
        echo "\nContext: Estado alterado para " . get_class($state) . ".\n";
        $this->state = $state;
        $this->state->setContext($this);
    }

    /**
     * Context delega parte de seu comportamento ao objeto State atual.
     */
    public function request1(): void
    {
        // A classe context pode se comportar como um decorator.
        echo "\nContext: Realizando operação request1 no contexto\n";
        $this->state->handle1();
    }

    public function request2(): void
    {
        echo "\nContext: Realizando operação request2 no contexto\n";
        $this->state->handle2();
    }
}



