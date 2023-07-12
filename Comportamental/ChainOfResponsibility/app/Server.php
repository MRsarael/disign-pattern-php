<?php

namespace App;

use App\Contracts\Middleware;
use App\Model\User;

/**
 * Classe "builder/factory/controller" que cria a cadeia de middlewares.
 */
class Server
{
    private $users = [];

    /**
     * @var Middleware
     */
    private $middleware;

    public function setMiddleware(Middleware $middleware): void
    {
        $this->middleware = $middleware;
    }

    public function logIn(User $user): bool
    {
        echo "Server: Autenticando usuário!\n";
        sleep(2);

        if ($this->middleware->check($user)) {
            echo "Server: Autenticado com sucesso!\n";
            return true;
        }

        return false;
    }

    /**
     * Registro de usuários.
     */
    public function register(User $user): void
    {
        $this->users[$user->getEmail()] = $user->getPassword();
    }

    public function hasEmail(string $email): bool
    {
        return isset($this->users[$email]);
    }

    public function isValidPassword(string $email, string $password): bool
    {
        return $this->users[$email] === $password;
    }
}


