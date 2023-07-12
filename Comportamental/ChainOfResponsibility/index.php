<?php

require_once 'autoload.php';

use App\Model\User;

use App\Middleware\ThrottlingMiddleware;
use App\Middleware\UserExistsMiddleware;
use App\Middleware\RoleCheckMiddleware;
use App\Server;

$server = new Server();

$server->register(new User("admin@email.com", "senha123"));
$server->register(new User("usuario_teste@bol.com", "senha321"));
$server->register(new User("outro_usuario@bol.com", "senha321"));
$server->register(new User("maisum_usuario@bol.com", "senha321"));

// Adicionando primeiro middleware
$middleware = new ThrottlingMiddleware(2);

$middleware
    ->linkWith(new UserExistsMiddleware($server))
    ->linkWith(new RoleCheckMiddleware());

$server->setMiddleware($middleware);

do {
    echo "\nDigite o email:\n";
    $email = readline();
    
    echo "Senha:\n";
    $password = readline();

    // Objeto usuário é o encapsulamento da requisição.
    $user = new User($email, $password);
    $success = $server->logIn($user);
} while (!$success);


