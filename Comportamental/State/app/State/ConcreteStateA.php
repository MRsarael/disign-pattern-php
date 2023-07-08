<?php

namespace App\State;

use App\Contracts\State;
use App\State\ConcreteStateB;

/**
 * Concrete States implement various behaviors, associated with a state of the Context.
 */
class ConcreteStateA extends State
{
    public function handle1(): void
    {
        echo "ConcreteStateA: método request1.\n";
        echo "ConcreteStateA: muda o estado do contexto para ConcreteStateB.\n";
        $this->context->transitionTo(new ConcreteStateB());
    }

    public function handle2(): void
    {
        echo "ConcreteStateA: método request2.\n";
    }
}



