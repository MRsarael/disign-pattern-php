<?php

namespace App;

/**
 * Classe importante para a lógica de negócio.
 */
class Receiver
{
    public function doSomething(string $a): void
    {
        echo "Receiver: executando (" . $a . ".)\n";
        sleep(3);
    }

    public function doSomethingElse(string $b): void
    {
        echo "Receiver: Mais executação de script (" . $b . ".)\n";
        sleep(3);
    }
}



