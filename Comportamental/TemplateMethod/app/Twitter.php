<?php

namespace App;

use App\Contracts\SocialNetwork;

/**
 * Concrete Template
 */
class Twitter extends SocialNetwork
{
    public function logIn(string $userName, string $password): bool
    {
        echo "\nTwitter: Autenticando usuário\n";
        sleep(2);

        echo "\nTwitter: Verificando credenciais\n";
        echo "\nTwitter: Name - " . $this->username . "\n";
        echo "\nTwitter: Password - " . str_repeat("*", strlen($this->password)) . "\n";

        echo "\n";

        // ------------------- LATENCIA -------------------
        echo '#';sleep(1);echo '#';sleep(1);echo '#';sleep(1);
        echo '#';sleep(1);echo '#';sleep(1);echo '#';sleep(1);
        echo '#';sleep(1);echo '#';sleep(1);echo '#';sleep(1);
        //-------------------------------------------------

        echo "\n\nTwitter: '" . $this->username . "' Usuário autenticado com sucesso!\n";
        return true;
    }

    public function sendData(string $message): bool
    {
        echo "Twitter: '" . $this->username . "' post - '" . $message . "'.\n";
        return true;
    }

    public function logOut(): void
    {
        echo "Twitter: '" . $this->username . "' logout.\n";
    }
}


