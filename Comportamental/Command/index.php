<?php

require_once 'autoload.php';

use App\Invoker;
use App\Receiver;
use App\ConcreteCommand\SimpleCommand;
use App\ConcreteCommand\ComplexCommand;

$invoker = new Invoker();
$receiver = new Receiver();

// O cliente deve conhecer a implementação dos comandos.
$invoker->setOnStart(new SimpleCommand("Olá mundo!"));
$invoker->setOnFinish(new ComplexCommand($receiver, "Enviando email", "Salvando relatório"));

$invoker->doSomethingImportant();


