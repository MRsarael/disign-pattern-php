<?php

/*
    Algoritmo de postagem de mensagens em redes sociais. Cada subclasse representa
    uma rede social e implementa todas as etapas de maneira diferente.
*/

require_once 'autoload.php';

use App\Facebook;
use App\Twitter;

echo "Usuário: \n";
$username = readline();

echo "Senha: \n";
$password = readline();

echo "Post message: \n";
$message = readline();

echo "\nEm qual rede social postar:\n" . "1 - Facebook\n" . "2 - Twitter\n";
$choice = readline();

switch ($choice) {
    case 1:
        $network = new Facebook($username, $password);
        break;
    case 2:
        $network = new Twitter($username, $password);
        break;
    default:
        die(":( Rede social não identificada. Por enquanto só integramos Facebook e Twitter.\n");
        break;
}

$network->post($message);


