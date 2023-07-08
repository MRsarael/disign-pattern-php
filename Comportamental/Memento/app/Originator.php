<?php

namespace App;

use App\Contracts\Memento;
use App\ConcreteMemento;

/**
 * O Originador mantém algum estado importante que pode mudar. Isso também
 * define um método para salvar o estado dentro de um memento e outro para restaurando
 */
class Originator
{
    /**
     * @var string Armazena o estado do originator.
     */
    private $state;

    public function __construct(string $state)
    {
        $this->state = $state;
        echo "Originator: Estado original: {$this->state}\n";
    }

    /**
     * Lógica de negócios do Originador
     */
    public function doSomething(): void
    {
        echo "Originator: Fazendo algo.\n";
        $this->state = $this->generateRandomString(30);
        echo "Originator: Estado alterado para: {$this->state}\n";
    }

    private function generateRandomString(int $length = 10): string
    {
        return substr(
            str_shuffle(
                str_repeat(
                    $x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                    ceil($length / strlen($x))
                )
            ),
            1,
            $length,
        );
    }

    /**
     * Salva o estado atual dentro de um memento.
     */
    public function save(): Memento
    {
        return new ConcreteMemento($this->state);
    }

    /**
     * Restaura o estado de um originator a partir de um objeto memento
     */
    public function restore(Memento $memento): void
    {
        $this->state = $memento->getState();
        echo "Originator: Estado alterado para: {$this->state}\n";
    }
}


