<?php

/**
 * O objeto Mediator expande a ideia do padrão Observer, fornecendo um expedidor de eventos centralizado.
 * Ele permite que qualquer objeto rastreie e acione eventos em outros objetos sem depender de suas classes.
*/

require_once 'autoload.php';

use App\Repository\UserRepository;
use App\OnboardingNotification;
use App\Logger;

$repository = new UserRepository();
\App\Helper\Event::events()->attach($repository, "facebook:update");

// Um arquivo de log será criado na raiz
$logger = new Logger(__DIR__ . "/log.txt");
\App\Helper\Event::events()->attach($logger, "*");

$onboarding = new OnboardingNotification("email_exemplo@teste.com");
\App\Helper\Event::events()->attach($onboarding, "users:created");

// Carregando usuários do arquvio csv users
$repository->initialize(__DIR__ . "users.csv");

$user = $repository->createUser([
    "name"  => "Rafael Moreira Almeida",
    "email" => "rafa.almeid@hotmail.com",
]);

$user->delete();


