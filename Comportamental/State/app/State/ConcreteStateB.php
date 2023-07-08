<?php

namespace App\State;

use App\Contracts\State;
use App\State\ConcreteStateA;

class ConcreteStateB extends State
{
    public function handle1(): void
    {
        echo "ConcreteStateB: método handle1.\n";
    }

    public function handle2(): void
    {
        echo "ConcreteStateB: método request2.\n";
        echo "ConcreteStateB: muda o estado do contexto para ConcreteStateA.\n";
        $this->context->transitionTo(new ConcreteStateA());
    }
}



