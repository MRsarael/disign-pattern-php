<?php

require_once 'autoload.php';

use App\Originator;
use App\Caretaker;

$originator = new Originator("Teste-state-Teste-state-Teste-state.");
$caretaker = new Caretaker($originator);

$caretaker->backup();
$originator->doSomething();

$caretaker->backup();
$originator->doSomething();

$caretaker->backup();
$originator->doSomething();

echo "\n";
$caretaker->showHistory();

echo "\nClient: Fazendo rollback do estado!\n\n";
$caretaker->undo();

echo "\nClient: outro rollback!\n\n";
$caretaker->undo();

echo "\nClient: mais um rollback!\n\n";
$caretaker->undo();


