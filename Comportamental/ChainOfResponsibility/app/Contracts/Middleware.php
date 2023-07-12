<?php

namespace App\Contracts;

use App\Model\User;

/**
 * Interface para vincular objetos middleware em cadeia.
 */
abstract class Middleware
{
    /**
     * @var Middleware
     */
    private $next;

    /**
     * Constroi uma cadeia de objetos de middleware.
     */
    public function linkWith(Middleware $next): Middleware
    {
        $this->next = $next;
        return $next;
    }

    /**
     * Processamento padrão da solicitação.
     */
    public function check(User $user): bool
    {
        if (!$this->next) return true;
        return $this->next->check($user);
    }
}


