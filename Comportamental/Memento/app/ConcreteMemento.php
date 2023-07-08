<?php

namespace App;

use App\Contracts\Memento;

/**
 * O Concrete Memento contém a estrutura para armazenar o estado do Originator.
 */
class ConcreteMemento implements Memento
{
    private $state;
    private $date;

    public function __construct(string $state)
    {
        $this->state = $state;
        $this->date = date('Y-m-d H:i:s');
    }

    /**
     * O Originator usa esse método ao restaurar seu estado.
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * O restante dos métodos são usados pelo Caretaker para exibir metadados.
     */
    public function getName(): string
    {
        return $this->date . " / (" . substr($this->state, 0, 9) . "...)";
    }

    public function getDate(): string
    {
        return $this->date;
    }
}


