<?php

namespace App\Middleware;

use App\Contracts\Middleware;
use App\Model\User;

/**
 * Concrete Middleware - checa permissões de usuário
 */
class RoleCheckMiddleware extends Middleware
{
    public function check(User $user): bool
    {
        $email = $user->getEmail();
        $password = $user->getPassword();

        if ($email === "admin@email.com") {
            echo "RoleCheckMiddleware: Olá, admin!\n";
            return true;
        }
        
        echo "RoleCheckMiddleware: Olá, usuário comum!\n";

        // O parent chama o próximo do cadeia.
        return parent::check($user);
    }
}

