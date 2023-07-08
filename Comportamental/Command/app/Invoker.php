<?php

namespace App;

use App\Contracts\Command;

/**
 * Invoker está associado aos comandos. Envia solicitações aos comandos.
 */
class Invoker
{
    /**
     * @var Command
     */
    private $onStart;

    /**
     * @var Command
     */
    private $onFinish;

    /**
     * Comando executado no início de alguma ação
     */
    public function setOnStart(Command $command): void
    {
        $this->onStart = $command;
    }

    /**
     * Comando executado ao final de alguma ação
     */
    public function setOnFinish(Command $command): void
    {
        $this->onFinish = $command;
    }

    /**
     * Invoker não depende de comandos concretos ou classes receptoras.
     * Passa uma solicitação para um receptor indiretamente, executando um comando.
     */
    public function doSomethingImportant(): void
    {
        echo "Invoker: Executando ação importante\n";

        if ($this->onStart instanceof Command) {
            echo "Invoker: Executando comando de inicialização\n";
            $this->onStart->execute();
        }

        echo "Invoker: ...Realizando operação importante...\n";
        sleep(2);
        echo "Invoker: Mais operações de negócio?\n";
        sleep(2);

        if ($this->onFinish instanceof Command) {
            echo "Invoker: Executando comando ao finalizar ação importante\n";
            $this->onFinish->execute();
        }
    }
}


