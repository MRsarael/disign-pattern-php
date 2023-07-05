<?php

namespace Network\Facebook;

use Network\SocialNetworkConnector;

class FacebookConnector implements SocialNetworkConnector
{
    private $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Realizando login do usuário Facebook $this->login e senha $this->password\n";
    }

    public function logOut(): void
    {
        echo "Realizando logout do usuário Facebook $this->login\n";
    }

    public function createPost($content): void
    {
        echo "Criando um novo post na timeline do Facebook.\n";
    }
}

