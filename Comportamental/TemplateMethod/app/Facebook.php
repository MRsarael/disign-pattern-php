<?php

namespace App;

use App\Contracts\SocialNetwork;

/**
 * Concrete Template
 */
class Facebook extends SocialNetwork
{
    public function logIn(string $userName, string $password): bool
    {
        echo "\nFacebook: Autenticando usuário\n";
        sleep(2);

        echo "\nFacebook: Verificando credenciais\n";
        echo "\nFacebook: Name - " . $this->username . "\n";
        echo "\nFacebook: Password - " . str_repeat("*", strlen($this->password)) . "\n";

        echo "\n";
        
        // ------------------- LATENCIA -------------------
        echo '.';sleep(1);echo '.';sleep(1);echo '.';sleep(1);
        echo '.';sleep(1);echo '.';sleep(1);echo '.';sleep(1);
        //-------------------------------------------------

        echo "\n\nFacebook: '" . $this->username . "' Usuário autenticado com sucesso!\n";
        return true;
    }

    public function sendData(string $message): bool
    {
        echo "Facebook: '" . $this->username . "' post - '" . $message . "'.\n";
        return true;
    }

    public function logOut(): void
    {
        echo "Facebook: '" . $this->username . "' logout.\n";
    }
}

