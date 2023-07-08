<?php

namespace App;

/**
 * O Caretaker não depende da classe Concrete Memento.
 * Não possui acesso ao estado do originator armazenado dentro do memento.
 */
class Caretaker
{
    /**
     * @var Memento[]
     */
    private $mementos = [];

    /**
     * @var Originator
     */
    private $originator;

    public function __construct(Originator $originator)
    {
        $this->originator = $originator;
    }

    public function backup(): void
    {
        echo "\nCaretaker: Salvando estado do originator...\n";
        $this->mementos[] = $this->originator->save();
    }

    public function undo(): void
    {
        if (!count($this->mementos)) {
            return;
        }
        
        $memento = array_pop($this->mementos);

        echo "Caretaker: Restaurando o estado de: " . $memento->getName() . "\n";
        try {
            $this->originator->restore($memento);
        } catch (\Exception $e) {
            $this->undo();
        }
    }

    public function showHistory(): void
    {
        echo "Caretaker: Listando os momentos registrados:\n";
        foreach ($this->mementos as $memento) {
            echo $memento->getName() . "\n";
        }
    }
}



