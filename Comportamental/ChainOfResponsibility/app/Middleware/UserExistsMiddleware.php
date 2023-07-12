<?php

namespace App\Middleware;

use App\Contracts\Middleware;
use App\Model\User;
use App\Server;

/**
 * Concrete Middleware - checa as credenciais de usuário
 */
class UserExistsMiddleware extends Middleware
{
    private $server;

    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function check(User $user): bool
    {
        $email = $user->getEmail();
        $password = $user->getPassword();

        if (!$this->server->hasEmail($email)) {
            echo "UserExistsMiddleware: O Email '$email' não existe!\n";
            return false;
        }

        if (!$this->server->isValidPassword($email, $password)) {
            echo "UserExistsMiddleware: Senha inválida!\n";
            return false;
        }

        // O parent chama o próximo do cadeia.
        return parent::check($user);
    }
}

