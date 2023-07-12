<?php

namespace App\Middleware;

use App\Contracts\Middleware;
use App\Model\User;

/**
 * Concrete Middleware - checa tentativas de login falhas.
 */
class ThrottlingMiddleware extends Middleware
{
    private $requestPerMinute;
    private $request;
    private $currentTime;

    public function __construct(int $requestPerMinute)
    {
        $this->requestPerMinute = $requestPerMinute;
        $this->currentTime = time();
    }

    public function check(User $user): bool
    {
        if (time() > $this->currentTime + 60) {
            $this->request = 0;
            $this->currentTime = time();
        }

        $this->request++;

        if ($this->request > $this->requestPerMinute) {
            echo "ThrottlingMiddleware: Limite de tentativas excedido!\n";
            die();
        }

        return parent::check($user);
    }
}


