<?php

namespace App;

use App\Contracts\Observer;

/**
 * Componente de Concreto - envia instruções iniciais para novos usuários.
 */
class OnboardingNotification implements Observer
{
    private $adminEmail;

    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function update(string $event, object $emitter, $data = null): void
    {
        sleep(2);
        echo "\nOnboardingNotification: Enviando email para ".$this->adminEmail." admin !\n";
        sleep(2);
        echo "\nOnboardingNotification: Notificação enviada!\n";
    }
}


