<?php

require_once 'autoload.php';

use App\Context;
use App\State\ConcreteStateA;
use App\State\ConcreteStateB;

$context = new Context(new ConcreteStateA());
$context->request1();
$context->request2();

$context->transitionTo(new ConcreteStateA());
$context->request1();

$context->transitionTo(new ConcreteStateB());
$context->request1();

$context->request2();


