<?php

namespace App\Events;

/**
 * Concrete Observer
 */
class OnboardingNotification implements \SplObserver
{
    private $adminEmail;

    public function __construct($adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function update(\SplSubject $repository, string $event = null, $data = null): void
    {
        echo "OnboardingNotification: Enviando email!\n";
        
        // ------------------- LATENCIA -------------------
        echo '.';sleep(1);echo '.';sleep(1);echo '.';sleep(1);
        echo '.';sleep(1);echo '.';sleep(1);echo '.';sleep(1);
        //-------------------------------------------------

        echo "\nOnboardingNotification: Email enviado!\n";
    }
}


