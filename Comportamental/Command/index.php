<?php

require_once 'autoload.php';

use App\Invoker;
use App\Receiver;
use App\ConcreteCommand\SimpleCommand;
use App\ConcreteCommand\ComplexCommand;

$invoker = new Invoker();
$invoker->setOnStart(new SimpleCommand("Olá mundo!"));
$receiver = new Receiver();
$invoker->setOnFinish(new ComplexCommand($receiver, "Enviando email", "Salvando relatório"));

$invoker->doSomethingImportant();

